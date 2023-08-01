<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->times(10)->create(); 

        foreach ($users as $user) {
            $post = Post::factory()->create(['user_id' => $user->id]);
            $user->posts()->save($post);
        }
    }
}
