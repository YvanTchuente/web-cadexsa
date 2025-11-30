<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user);

        $this->get(route('destroy_account'))->assertStatus(200);

        $this->post(route('destroy_account'))
            ->assertRedirect(route('login'));

        $this->assertFalse($this->isAuthenticated());
        $this->assertTrue($user->trashed());
    }
}
