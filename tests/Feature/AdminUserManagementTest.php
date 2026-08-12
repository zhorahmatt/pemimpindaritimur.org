<?php

namespace Tests\Feature;

use App\Models\User;
use App\Support\Rbac\PermissionCatalog;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUserManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_admin_cannot_delete_themselves(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole(PermissionCatalog::ROLE_ADMIN);

        $this->actingAs($admin)
            ->delete('/admin/users/'.$admin->id)
            ->assertSessionHasErrors('user');

        $this->assertNotNull(User::find($admin->id));
    }

    public function test_last_super_admin_cannot_be_deleted(): void
    {
        $super = User::factory()->create();
        $super->assignRole(PermissionCatalog::ROLE_SUPER_ADMIN);

        $this->actingAs($super)
            ->delete('/admin/users/'.$super->id)
            ->assertSessionHasErrors('user');

        $this->assertNotNull(User::find($super->id));
    }

    public function test_super_admin_role_cannot_be_assigned_through_ui(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole(PermissionCatalog::ROLE_ADMIN);
        $target = User::factory()->create();

        $this->actingAs($admin)
            ->post('/admin/users/'.$target->id.'/roles', [
                'roles' => [PermissionCatalog::ROLE_SUPER_ADMIN],
            ])
            ->assertSessionHasErrors('roles.0');

        $target->refresh();
        $this->assertFalse($target->hasRole(PermissionCatalog::ROLE_SUPER_ADMIN));
    }

    public function test_admin_can_assign_assignable_roles(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole(PermissionCatalog::ROLE_ADMIN);
        $target = User::factory()->create();

        $this->actingAs($admin)
            ->post('/admin/users/'.$target->id.'/roles', [
                'roles' => [PermissionCatalog::ROLE_EDITOR],
            ])
            ->assertRedirect();

        $this->assertTrue($target->fresh()->hasRole(PermissionCatalog::ROLE_EDITOR));
    }

    public function test_admin_can_edit_user_profile(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole(PermissionCatalog::ROLE_ADMIN);
        $target = User::factory()->create(['name' => 'Old Name']);

        $this->actingAs($admin)
            ->put('/admin/users/'.$target->id, [
                'name' => 'New Name',
                'email' => $target->email,
            ])
            ->assertRedirect();

        $this->assertSame('New Name', $target->fresh()->name);
    }

    public function test_self_account_update_requires_current_password_to_change_password(): void
    {
        $user = User::factory()->create([
            'password' => 'old-password',
        ]);

        $this->actingAs($user)
            ->put('/admin/account', [
                'name' => $user->name,
                'email' => $user->email,
                'current_password' => 'wrong-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->assertSessionHasErrors('current_password');
    }

    public function test_self_account_update_succeeds_with_correct_current_password(): void
    {
        $user = User::factory()->create([
            'password' => 'old-password',
        ]);

        $this->actingAs($user)
            ->put('/admin/account', [
                'name' => 'Updated Name',
                'email' => $user->email,
                'current_password' => 'old-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->assertRedirect();

        $this->assertSame('Updated Name', $user->fresh()->name);
        $this->assertTrue(password_verify('new-password', $user->fresh()->password));
    }
}
