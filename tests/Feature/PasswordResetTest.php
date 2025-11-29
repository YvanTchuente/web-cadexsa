<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_page_can_be_rendered(): void
    {
        $response = $this->get(route('password.request'));

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        Notification::fake();
        $user = User::factory()->create();

        $this->post(
            route('password.email'),
            ['email' => $user->email]
        )->assertSessionHas('status');

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_reset_password_page_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_reset_their_password_with_valid_token(): void
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new_long_password',
            'password_confirmation' => 'new_long_password',
        ]);

        $response->assertSessionHasNoErrors();
    }

    public function test_user_can_not_reset_password_with_invalid_token(): void
    {
        $response = $this->post(route('password.update'), [
            'token' => 'invalid-token',
            'email' => 'random@email.com',
            'password' => 'new_long_password',
            'password_confirmation' => 'new_long_password',
        ]);

        $response->assertSessionHasErrors();
    }
}
