<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_log_in_with_correct_credentials(): void
    {
        $user = User::factory()->create([
            'username' => 'exampleuser',
            'password' => Hash::make('password'),
        ]);

        $this->post('/login', [
            'login' => 'exampleuser',
            'password' => 'password',
        ])->assertRedirect(route('member.profile', ['username' => $user->username]));

        $this->assertAuthenticated();
    }

    public function test_users_can_not_login_with_invalid_credentials(): void
    {
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => Hash::make('password'),
        ]);

        $this->post(route('login'), [
            'login' => 'exampleuser',
            'password' => 'password',
        ])->assertSessionHas('error');

        $this->assertFalse($this->isAuthenticated());
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
             ->get(route('logout'))
             ->assertRedirect(route('login'))
             ->assertSessionHas('status');

        $this->assertGuest();
    }
}
