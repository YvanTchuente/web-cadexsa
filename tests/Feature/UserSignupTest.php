<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class UserSignupTest extends TestCase
{
    use RefreshDatabase;

    public function test_signup_page_can_be_rendered(): void
    {
        $response = $this->get(route('signup'));

        $response->assertStatus(200);
    }

    public function test_new_users_can_sign_up(): void
    {
        Notification::fake();

        $user = UserFactory::new()->definition();
        $user['email'] = 'test@example.com';
        $user['password'] = 'Password123!';
        $user['password_confirmation'] = 'Password123!';
        $user['field-of-study'] = $user['field_of_study'];
        $user['phone'] = '123-456-7890';
        $user['batch'] = '2021';

        $this->post(route('signup'), $user)
            ->assertSessionHas('success');

        $this->assertDatabaseHas('users', ['email' => 'test@example.com', 'batch' => '2021']);

        Notification::assertSentTo(
            User::all()->first(),
            VerifyEmail::class
        );
    }
}
