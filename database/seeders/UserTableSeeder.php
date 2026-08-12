<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\Rbac\PermissionCatalog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('foundation.admin.email') ?: 'admin@gmail.com';
        $name = config('foundation.admin.name') ?: 'Administrator';
        $password = config('foundation.admin.password') ?: 'password';

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
            ],
        );

        if (! $user->hasRole(PermissionCatalog::ROLE_SUPER_ADMIN)) {
            $user->assignRole(PermissionCatalog::ROLE_SUPER_ADMIN);
        }
    }
}
