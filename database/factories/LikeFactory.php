<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'post_id' => $this->faker->boolean(70) ? Post::inRandomOrder()->first()->id : null, // 70% chance to like a post
            'comment_id' => $this->faker->boolean(30) ? Comment::inRandomOrder()->first()->id : null, // 30% chance to like a comment
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
