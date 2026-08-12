<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Rbac\PermissionCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request): Response
    {
        $roles = Role::query()
            ->with('permissions:id,name')
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return Inertia::render('Admin/Role/Index', [
            'roles' => $roles,
            'permissions' => PermissionCatalog::all(),
            'reservedRoles' => [PermissionCatalog::ROLE_SUPER_ADMIN],
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Role/Edit', [
            'role' => null,
            'permissions' => PermissionCatalog::all(),
            'selectedPermissions' => [],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateRole($request);

        $role = Role::create([
            'name' => $data['name'],
            'guard_name' => config('auth.defaults.guard', 'web'),
        ]);

        $role->syncPermissions($data['permissions'] ?? []);

        return redirect()->route('admin.role.index')->with('success', 'Peran berhasil ditambahkan.');
    }

    public function edit(Role $role): Response
    {
        return Inertia::render('Admin/Role/Edit', [
            'role' => [
                'id' => $role->id,
                'name' => $role->name,
            ],
            'permissions' => PermissionCatalog::all(),
            'selectedPermissions' => $role->permissions->pluck('name')->all(),
        ]);
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        if ($role->name === PermissionCatalog::ROLE_SUPER_ADMIN) {
            return back()->withErrors(['role' => 'Peran super-admin tidak dapat diubah.']);
        }

        $data = $this->validateRole($request, $role);

        $role->update(['name' => $data['name']]);
        $role->syncPermissions($data['permissions'] ?? []);

        return redirect()->route('admin.role.index')->with('success', 'Peran berhasil diperbarui.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        if ($role->name === PermissionCatalog::ROLE_SUPER_ADMIN) {
            return back()->withErrors(['role' => 'Peran super-admin tidak dapat dihapus.']);
        }

        $role->delete();

        return redirect()->route('admin.role.index')->with('success', 'Peran berhasil dihapus.');
    }

    private function validateRole(Request $request, ?Role $role = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:191', Rule::unique('roles', 'name')
                ->where('guard_name', config('auth.defaults.guard', 'web'))
                ->ignore($role?->id)],
            'permissions' => ['array'],
            'permissions.*' => ['string', Rule::in(PermissionCatalog::all())],
        ], [
            'name.required' => 'Nama peran wajib diisi.',
            'name.unique' => 'Nama peran sudah digunakan.',
        ]);
    }
}
