<?php

namespace Database\Factories;

use App\Enumerations\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsArticle>
 */
class NewsArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        foreach (NewsCategory::cases() as $category) {
            $categories[] = $category->value;
        }
        $rand_key = array_rand($categories);

        return [
            'title' => fake()->text(80),
            'body' => fake()->text(3000),
            'category' => $categories[$rand_key],
            'image' => fake()->imageUrl(1024, 1024),
            'author_id' => random_int(1, 10),
            'created_at' => now(),
        ];
    }
}
