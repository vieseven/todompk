<?php

namespace Database\Factories;

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
        return [
            'title'  =>$this ->faker->sentence(rand(8,12)),
            'content' =>$this ->faker->paragraph(rand(5,10)),
            'user_id' =>rand(1,50),
        ];
    }
}
