<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInvitation;
use App\Support\Rbac\PermissionCatalog;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AcceptInvitationController extends Controller
{
    public function show(string $token): Response
    {
        $invitation = $this->findActiveInvitation($token);

        if (! $invitation) {
            abort(HttpResponse::HTTP_GONE, 'Undangan tidak valid atau sudah tidak berlaku.');
        }

        return Inertia::render('Auth/AcceptInvitation', [
            'invitation' => [
                'name' => $invitation->name,
                'email' => $invitation->email,
                'role' => $invitation->role,
                'expires_at' => $invitation->expires_at?->toIso8601String(),
            ],
        ]);
    }

    public function accept(Request $request, string $token): RedirectResponse
    {
        $invitation = $this->findActiveInvitation($token);

        if (! $invitation) {
            abort(HttpResponse::HTTP_GONE, 'Undangan tidak valid atau sudah tidak berlaku.');
        }

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.required' => 'Kata sandi wajib diisi.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
        ]);

        $user = DB::transaction(function () use ($invitation, $validated) {
            $user = User::create([
                'name' => $invitation->name,
                'email' => $invitation->email,
                'password' => Hash::make($validated['password']),
                'email_verified_at' => now(),
            ]);

            $user->assignRole($invitation->role);

            $invitation->forceFill([
                'accepted_at' => now(),
                'accepted_by' => $user->id,
            ])->save();

            return $user;
        });

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended($this->landingRouteFor($user));
    }

    private function findActiveInvitation(string $token): ?UserInvitation
    {
        $hash = hash('sha256', $token);

        $invitation = UserInvitation::query()
            ->where('token_hash', $hash)
            ->first();

        if (! $invitation) {
            return null;
        }

        if ($invitation->isAccepted() || $invitation->isRevoked()) {
            return null;
        }

        if ($invitation->isExpired()) {
            return null;
        }

        return $invitation;
    }

    private function landingRouteFor(User $user): string
    {
        if ($user->hasRole(PermissionCatalog::ROLE_SUPER_ADMIN)
            || $user->can('admin.dashboard.view')) {
            return route('admin.dashboard');
        }

        return route('admin.account.edit');
    }

    public static function generateToken(): string
    {
        return Str::random(64);
    }

    public static function hashToken(string $token): string
    {
        return hash('sha256', $token);
    }
}
