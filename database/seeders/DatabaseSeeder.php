<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\Comment;
use App\Models\CommentLikes;
use App\Models\Follows;
use App\Models\Message;
use App\Models\Post;
use App\Models\PostLikes;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Admin::factory(5)->create();
        Post::factory(5)->create();
        PostLikes::factory(5)->create();
        Comment::factory(5)->create();
        CommentLikes::factory(5)->create();
        Follows::factory(5)->create();
        Message::factory(5)->create();
    }
}
