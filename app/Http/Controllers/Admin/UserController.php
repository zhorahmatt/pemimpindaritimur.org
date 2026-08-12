<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\AcceptInvitationController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInvitation;
use App\Notifications\UserInvitationNotification;
use App\Support\Rbac\PermissionCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $users = User::query()
            ->with('roles:id,name')
            ->when($request->input('q'), function ($query, $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('name', 'like', "%{$term}%")
                        ->orWhere('email', 'like', "%{$term}%");
                });
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        $users->getCollection()->transform(function (User $user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles->pluck('name')->all(),
                'created_at' => $user->created_at?->toIso8601String(),
            ];
        });

        return Inertia::render('Admin/User/Index', [
            'users' => $users,
            'filters' => [
                'q' => $request->input('q', ''),
            ],
            'superAdminCount' => User::role(PermissionCatalog::ROLE_SUPER_ADMIN)->count(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/User/Create', [
            'roles' => PermissionCatalog::ASSIGNABLE_ROLES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateInvitation($request);

        $existing = User::query()
            ->whereRaw('lower(email) = ?', [Str::lower($data['email'])])
            ->exists();

        if ($existing) {
            return back()->withErrors(['email' => 'Email sudah terdaftar sebagai pengguna.'])->withInput();
        }

        $token = AcceptInvitationController::generateToken();

        $invitation = UserInvitation::create([
            'name' => $data['name'],
            'email' => Str::lower($data['email']),
            'role' => $data['role'],
            'token_hash' => AcceptInvitationController::hashToken($token),
            'invited_by' => $request->user()->id,
            'expires_at' => now()->addHours(config('foundation.invitations.ttl_hours', 168)),
        ]);

        $url = route('invitation.show', ['token' => $token]);

        $throttleKey = 'invitation:'.$request->user()->id;
        if (RateLimiter::tooManyAttempts($throttleKey, config('foundation.invitations.rate_limit_per_minute', 10))) {
            return back()->withErrors(['email' => 'Terlalu banyak undangan yang dikirim. Coba lagi nanti.'])->withInput();
        }
        RateLimiter::hit($throttleKey);

        $invitation->inviter->notify(new UserInvitationNotification($url, $data['role']));

        return redirect()->route('admin.user.invitations')->with('success', 'Undangan berhasil dikirim.');
    }

    public function edit(User $user): Response
    {
        return Inertia::render('Admin/User/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles->pluck('name')->all(),
            ],
            'roles' => PermissionCatalog::ASSIGNABLE_ROLES,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
        ]);

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->id === $request->user()->id) {
            return back()->withErrors(['user' => 'Anda tidak dapat menghapus akun Anda sendiri.']);
        }

        if ($this->isLastSuperAdmin($user)) {
            return back()->withErrors(['user' => 'Tidak dapat menghapus super-admin terakhir.']);
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function syncRoles(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'roles' => ['array'],
            'roles.*' => ['string', Rule::in(PermissionCatalog::ASSIGNABLE_ROLES)],
        ]);

        if ($this->isLastSuperAdmin($user) && ! in_array(PermissionCatalog::ROLE_SUPER_ADMIN, $data['roles'], true)) {
            return back()->withErrors(['roles' => 'Tidak dapat menghapus peran super-admin dari pengguna terakhir yang memilikinya.']);
        }

        $user->syncRoles($data['roles'] ?? []);

        return redirect()->route('admin.user.index')->with('success', 'Peran pengguna berhasil diperbarui.');
    }

    public function invitations(Request $request): Response
    {
        $invitations = UserInvitation::query()
            ->with('inviter:id,name')
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return Inertia::render('Admin/User/Invitations', [
            'invitations' => $invitations,
        ]);
    }

    public function resendInvitation(Request $request, UserInvitation $invitation): RedirectResponse
    {
        if (! $invitation->isPending()) {
            return back()->withErrors(['invitation' => 'Undangan tidak dapat dikirim ulang.']);
        }

        $token = AcceptInvitationController::generateToken();
        $invitation->forceFill([
            'token_hash' => AcceptInvitationController::hashToken($token),
            'expires_at' => now()->addHours(config('foundation.invitations.ttl_hours', 168)),
        ])->save();

        $url = route('invitation.show', ['token' => $token]);
        $invitation->inviter->notify(new UserInvitationNotification($url, $invitation->role));

        return back()->with('success', 'Undangan berhasil dikirim ulang.');
    }

    public function revokeInvitation(Request $request, UserInvitation $invitation): RedirectResponse
    {
        if (! $invitation->isPending()) {
            return back()->withErrors(['invitation' => 'Undangan tidak dapat dicabut.']);
        }

        $invitation->forceFill(['revoked_at' => now()])->save();

        return back()->with('success', 'Undangan berhasil dicabut.');
    }

    private function validateInvitation(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['required', Rule::in(PermissionCatalog::ASSIGNABLE_ROLES)],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'role.required' => 'Peran wajib dipilih.',
            'role.in' => 'Peran yang dipilih tidak valid.',
        ]) + ['password' => null];
    }

    private function isLastSuperAdmin(User $user): bool
    {
        if (! $user->hasRole(PermissionCatalog::ROLE_SUPER_ADMIN)) {
            return false;
        }

        return User::role(PermissionCatalog::ROLE_SUPER_ADMIN)->count() <= 1;
    }
}
