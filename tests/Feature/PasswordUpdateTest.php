<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_update_form_can_be_rendered(): void
    {
        $this->actingAs(User::factory()->create(['email_verified_at' => now()]));

        $this->get(route('settings.password'))
            ->assertStatus(200);
    }

    public function test_user_can_update_their_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('original_password'),
            'email_verified_at' => now()
        ]);
        $this->actingAs($user);

        $response = $this->post(route('settings.password'),[
            'current_password' => 'original_password',
            'password' => 'new_long_password',
            'password_confirmation' => 'new_long_password'
        ]);

        // Reload the user to get the updated password
        $user->refresh();

        $response->assertRedirect(route('settings.password'))
                ->assertSessionHas('success');
        $this->assertTrue(Hash::check('new_long_password', $user->password));
        $this->assertFalse(Hash::check('original_password', $user->password));
    }
}
