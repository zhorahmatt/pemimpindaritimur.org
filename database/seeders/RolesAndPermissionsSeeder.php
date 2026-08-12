<?php

namespace Database\Seeders;

use App\Support\Rbac\PermissionCatalog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('cache:clear');
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $guard = config('auth.defaults.guard', 'web');

        foreach (PermissionCatalog::all() as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => $guard,
            ]);
        }

        $roles = [
            PermissionCatalog::ROLE_SUPER_ADMIN,
            PermissionCatalog::ROLE_ADMIN,
            PermissionCatalog::ROLE_EDITOR,
            PermissionCatalog::ROLE_REGISTRATION_OFFICER,
            PermissionCatalog::ROLE_MEMBER,
        ];

        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => $guard,
            ]);

            if ($roleName === PermissionCatalog::ROLE_SUPER_ADMIN) {
                $role->syncPermissions([]);

                continue;
            }

            $role->syncPermissions(PermissionCatalog::permissionsForRole($roleName));
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
