<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\AcceptInvitationController;
use App\Models\User;
use App\Models\UserInvitation;
use App\Notifications\UserInvitationNotification;
use App\Support\Rbac\PermissionCatalog;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class InvitationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_admin_can_create_invitation(): void
    {
        Notification::fake();

        $inviter = User::factory()->create();
        $inviter->assignRole(PermissionCatalog::ROLE_ADMIN);

        $this->actingAs($inviter)
            ->post('/admin/users', [
                'name' => 'Test Editor',
                'email' => 'editor@example.com',
                'role' => PermissionCatalog::ROLE_EDITOR,
            ])
            ->assertRedirect('/admin/users/invitations');

        $this->assertDatabaseHas('user_invitations', [
            'email' => 'editor@example.com',
            'role' => PermissionCatalog::ROLE_EDITOR,
            'invited_by' => $inviter->id,
        ]);

        Notification::assertSentTo($inviter, UserInvitationNotification::class);
    }

    public function test_editor_cannot_create_invitation(): void
    {
        $editor = User::factory()->create();
        $editor->assignRole(PermissionCatalog::ROLE_EDITOR);

        $this->actingAs($editor)
            ->post('/admin/users', [
                'name' => 'Should Fail',
                'email' => 'fail@example.com',
                'role' => PermissionCatalog::ROLE_MEMBER,
            ])
            ->assertStatus(403);
    }

    public function test_accepting_invitation_creates_user_and_assigns_role(): void
    {
        Notification::fake();

        $inviter = User::factory()->create();
        $inviter->assignRole(PermissionCatalog::ROLE_ADMIN);

        $plainToken = 'plain-token-123';

        $invitation = UserInvitation::create([
            'name' => 'Pending Member',
            'email' => 'pending@example.com',
            'role' => PermissionCatalog::ROLE_MEMBER,
            'token_hash' => AcceptInvitationController::hashToken($plainToken),
            'invited_by' => $inviter->id,
            'expires_at' => now()->addDays(2),
        ]);

        $this->get('/invite/'.$plainToken)->assertOk();

        $this->post('/invite/'.$plainToken, [
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
        ])->assertRedirect();

        $user = User::where('email', 'pending@example.com')->firstOrFail();
        $this->assertTrue($user->hasRole(PermissionCatalog::ROLE_MEMBER));
        $this->assertNotNull($user->email_verified_at);
        $this->assertTrue(Hash::check('secret-password', $user->password));

        $invitation->refresh();
        $this->assertNotNull($invitation->accepted_at);
        $this->assertSame($user->id, $invitation->accepted_by);
    }

    public function test_invitation_is_single_use(): void
    {
        $inviter = User::factory()->create();
        $invitation = UserInvitation::create([
            'name' => 'Member',
            'email' => 'member@example.com',
            'role' => PermissionCatalog::ROLE_MEMBER,
            'token_hash' => AcceptInvitationController::hashToken('token-1'),
            'invited_by' => $inviter->id,
            'expires_at' => now()->addDay(),
        ]);

        $this->post('/invite/token-1', [
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ])->assertRedirect();

        $this->get('/invite/token-1')->assertStatus(410);
    }

    public function test_expired_invitation_is_rejected(): void
    {
        $inviter = User::factory()->create();
        UserInvitation::create([
            'name' => 'Expired',
            'email' => 'expired@example.com',
            'role' => PermissionCatalog::ROLE_MEMBER,
            'token_hash' => AcceptInvitationController::hashToken('expired-token'),
            'invited_by' => $inviter->id,
            'expires_at' => now()->subDay(),
        ]);

        $this->get('/invite/expired-token')->assertStatus(410);
    }

    public function test_invitation_email_must_be_unique(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole(PermissionCatalog::ROLE_ADMIN);
        User::factory()->create(['email' => 'taken@example.com']);

        $this->actingAs($admin)
            ->post('/admin/users', [
                'name' => 'Duplicate',
                'email' => 'taken@example.com',
                'role' => PermissionCatalog::ROLE_MEMBER,
            ])
            ->assertSessionHasErrors('email');
    }
}
