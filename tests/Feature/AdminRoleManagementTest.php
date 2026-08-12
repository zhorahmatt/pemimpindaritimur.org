<?php

namespace Tests\Feature;

use App\Models\User;
use App\Support\Rbac\PermissionCatalog;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminRoleManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_super_admin_can_create_role(): void
    {
        $super = User::factory()->create();
        $super->assignRole(PermissionCatalog::ROLE_SUPER_ADMIN);

        $this->actingAs($super)
            ->post('/admin/roles', [
                'name' => 'content-curator',
                'permissions' => ['content.blogs.view', 'content.blogs.create'],
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('roles', ['name' => 'content-curator']);
        $role = Role::findByName('content-curator');
        $this->assertTrue($role->hasPermissionTo('content.blogs.view'));
    }

    public function test_admin_role_cannot_create_roles(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole(PermissionCatalog::ROLE_ADMIN);

        $this->actingAs($admin)
            ->post('/admin/roles', [
                'name' => 'should-be-denied',
                'permissions' => [],
            ])
            ->assertStatus(403);
    }

    public function test_super_admin_role_cannot_be_updated_or_deleted(): void
    {
        $super = User::factory()->create();
        $super->assignRole(PermissionCatalog::ROLE_SUPER_ADMIN);
        $superRole = Role::findByName(PermissionCatalog::ROLE_SUPER_ADMIN);

        $this->actingAs($super)
            ->put('/admin/roles/'.$superRole->id, [
                'name' => 'super-admin',
                'permissions' => [],
            ])
            ->assertSessionHasErrors('role');

        $this->actingAs($super)
            ->delete('/admin/roles/'.$superRole->id)
            ->assertSessionHasErrors('role');

        $this->assertNotNull(Role::findByName(PermissionCatalog::ROLE_SUPER_ADMIN));
    }

    public function test_unknown_permissions_are_rejected(): void
    {
        $super = User::factory()->create();
        $super->assignRole(PermissionCatalog::ROLE_SUPER_ADMIN);

        $this->actingAs($super)
            ->post('/admin/roles', [
                'name' => 'bad-perms',
                'permissions' => ['not.a.real.permission'],
            ])
            ->assertSessionHasErrors('permissions.0');
    }
}
