<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Users
        User::factory(10)->create();

        // Create Categories
        Category::factory(5)->create();

        // Create Posts
        Post::factory(20)->create();

        // Create Comments
        Comment::factory(50)->create();

        // Create Likes
        Like::factory(100)->create(); // 100 random likes
    }
}
