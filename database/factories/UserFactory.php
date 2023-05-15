<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use App\Enumerations\FieldOfStudy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        foreach (FieldOfStudy::cases() as $field) {
            $fields[] = $field->value;
        }
        $rand_key = array_rand($fields);

        return [
            'username' => fake()->userName(),
            'password' => Hash::make('W5$FY&L9l8k9LsJ'),
            'email' => fake()->unique()->safeEmail(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'batch' => fake()->year(),
            'field_of_study' => $fields[$rand_key],
            'country' => fake()->country(),
            'city' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'avatar' => '/images/graphics/default-profile-picture.png',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
