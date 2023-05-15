<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $occurs_on = random_int(2, 4) . " months";
        $ends_on = $occurs_on . " +" . random_int(2, 24) . "hours";

        return [
            'name' => fake()->text(80),
            'venue' => fake()->address(),
            'occurs_on' => new \DateTime($occurs_on),
            'ends_on' => new \DateTime($ends_on),
            'description' => fake()->text(3000),
            'image' => fake()->imageUrl(1024, 1024),
            'created_at' => now(),
            'status' => '1'
        ];
    }
}
