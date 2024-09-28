<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'password' => bcrypt('password')
            ]);
            User::factory(10)->create();
            Post::factory(500)->create();
        } else {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('password')
            ]);
        }
    }
}
