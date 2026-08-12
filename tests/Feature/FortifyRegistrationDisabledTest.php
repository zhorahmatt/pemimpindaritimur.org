<?php

namespace Tests\Feature;

use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FortifyRegistrationDisabledTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_get_register_route_is_unavailable(): void
    {
        $this->get('/register')->assertStatus(404);
    }

    public function test_post_register_route_is_unavailable(): void
    {
        $this->post('/register', [
            'name' => 'Random',
            'email' => 'random@example.com',
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
        ])->assertStatus(404);
    }
}
