<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_page_can_be_rendered_when_user_is_authenticated(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get(route('verification.notice'))
            ->assertStatus(200);
    }

    public function test_email_verification_page_can_not_be_rendered_when_user_is_not_authenticated(): void
    {
        $status = $this->get(route('verification.notice'))->getStatusCode();

        $this->assertNotEquals(200, $status);
    }

    public function test_email_can_be_verified_with_valid_link(): void
    {
        $user = User::factory()->create(['email_verified_at' => null]);
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $this->actingAs($user)->get($verificationUrl)
            ->assertRedirect(route('home'));

        $this->assertNotNull($user->fresh()->email_verified_at);
    }
}
