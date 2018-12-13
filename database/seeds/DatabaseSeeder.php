<?php

use CodePress\CodePosts\Models\Post;
use CodePress\CodePosts\Models\Comment;
use CodePress\CodeUser\Models\User;
use Illuminate\Database\Seeder;
use CodePress\CodeCategory\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Category::class, 5)->create();
        factory(Post::class, 10)->create()->each(function ($post){
            foreach (range(1, 10)as $value){
                $post->comments()->save(factory(Comment::class)->make());
            }
        });
        factory(User::class)->create();
        $this->command->info("Finished Seeders!");
    }
}
