<?php

namespace Database\Factories;

use App\Models\Owner;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posts = Post::pluck('id')->toArray();
        $owners = Owner::pluck('id')->toArray();
        return [
            'content' => fake()->realText(),
            'post_id' => fake()->randomElement($posts),
            'owner_id' => fake()->randomElement($owners),
        ];
    }
}
