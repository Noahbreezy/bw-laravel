<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // get the first user

        Post::create([
            'title' => 'First post',
            'content' => 'This is the content of the first post.',
            'user_id' => $user->id,
            'publishDate' => now(),
            'cover' => 'covers/default.jpg', // Use a placeholder image path
        ]);

        // Add more posts as needed...
    }
}
