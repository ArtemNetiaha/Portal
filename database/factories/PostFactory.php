<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => fake()->text(300),
            'category_id' => rand(1, 8),
            'user_id' => rand(1, 10),
            'image' => 'storage/images/4879477847.webp',
            'created_at'=>Carbon::today()->subDays(rand(0, 5))
        ];
    }
}
