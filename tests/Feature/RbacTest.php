<?php

namespace Tests\Feature;

use App\Models\User;
use App\Support\Rbac\PermissionCatalog;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UserTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RbacTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_all_catalog_permissions_are_seeded(): void
    {
        foreach (PermissionCatalog::all() as $permission) {
            $this->assertNotNull(Permission::findByName($permission), "Permission {$permission} missing");
        }
    }

    public function test_each_role_has_expected_permissions(): void
    {
        $admin = Role::findByName(PermissionCatalog::ROLE_ADMIN);
        foreach (PermissionCatalog::permissionsForRole(PermissionCatalog::ROLE_ADMIN) as $permission) {
            $this->assertTrue($admin->hasPermissionTo($permission));
        }

        $editor = Role::findByName(PermissionCatalog::ROLE_EDITOR);
        $this->assertTrue($editor->hasPermissionTo('content.blogs.create'));
        $this->assertFalse($editor->hasPermissionTo('admin.users.invite'));

        $officer = Role::findByName(PermissionCatalog::ROLE_REGISTRATION_OFFICER);
        $this->assertTrue($officer->hasPermissionTo('registrations.minaut.view'));
        $this->assertFalse($officer->hasPermissionTo('content.blogs.create'));
    }

    public function test_bootstrap_user_is_super_admin(): void
    {
        $this->seed(UserTableSeeder::class);

        $email = config('foundation.admin.email') ?: 'admin@gmail.com';
        $user = User::where('email', $email)->firstOrFail();

        $this->assertTrue($user->hasRole(PermissionCatalog::ROLE_SUPER_ADMIN));
        $this->assertTrue($user->can('content.blogs.create'));
    }

    public function test_admin_routes_are_unavailable_for_guests(): void
    {
        $this->get('/admin/users')->assertRedirect('/login');
        $this->get('/admin/roles')->assertRedirect('/login');
        $this->get('/admin/account')->assertRedirect('/login');
    }

    public function test_admin_routes_require_permission_for_authenticated_user(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get('/admin/users')->assertStatus(403);
        $this->get('/admin/roles')->assertStatus(403);
    }

    public function test_admin_role_can_access_user_management_routes(): void
    {
        $user = User::factory()->create();
        $user->assignRole(PermissionCatalog::ROLE_ADMIN);
        $this->actingAs($user);

        $this->get('/admin/users')->assertOk();
        $this->get('/admin/roles')->assertOk();
    }

    public function test_registration_officer_can_access_only_registration_dashboard(): void
    {
        $user = User::factory()->create();
        $user->assignRole(PermissionCatalog::ROLE_REGISTRATION_OFFICER);
        $this->actingAs($user);

        $this->get('/admin/dashboard')->assertOk();
        $this->get('/ilmu-keuangan/dashboard')->assertOk();
        $this->get('/minaut-indonesia/dashboard')->assertOk();
        $this->get('/admin/users')->assertStatus(403);
        $this->get('/admin/blogs')->assertStatus(403);
    }

    public function test_registration_dashboards_require_authentication(): void
    {
        $this->get('/ilmu-keuangan/dashboard')->assertRedirect('/login');
        $this->get('/minaut-indonesia/dashboard')->assertRedirect('/login');
    }

    public function test_registration_officer_cannot_export_without_permission(): void
    {
        $user = User::factory()->create();
        $user->assignRole(PermissionCatalog::ROLE_REGISTRATION_OFFICER);
        $this->actingAs($user);

        $this->get('/ilmu-keuangan/dashboard/export')->assertOk();
        $this->get('/minaut-indonesia/dashboard/export')->assertOk();
    }

    public function test_self_account_route_is_accessible_to_any_authenticated_user(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get('/admin/account')->assertOk();
    }
}
