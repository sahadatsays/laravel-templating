<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PDO;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(env('APP_ENV') == 'local') {
            User::truncate();
            Post::truncate();
            User::create([
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('password'),
                'is_admin' => 1,
            ]);
            User::factory(10)->create();
            Category::factory(500)->create();
            Post::factory(500)->make()->map(function ($item) {
                $item->user_id = User::inRandomOrder()->first()->id;
                $item->save();
            });

            Comment::factory(5000)->make()->map(function ($comment) {
                $comment->user_id = User::inRandomOrder()->first()->id;
                $comment->post_id = Post::inRandomOrder()->first()->id;
                $comment->save();
            });

        } else {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('password')
            ]);
        }
    }
}
