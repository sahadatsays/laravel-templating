<?php

namespace Database\Factories;

use App\Models\User;
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
        $title = fake()->sentence;
        return [
            // 'user_id' => User::inRandomOrder()->first()->id,
            'title_en' => $title,
            'title_ar' => $title,
            'title_bn' => $title,
            'slug' => str($title)->slug(),
            'content' => fake()->paragraph(10),
            'active' => fake()->randomElement([0, 1]),
            'created_at' => fake()->dateTimeBetween('-5 years', '+2 days')
        ];
    }
}
