<?php

use CodePress\CodeCategory\Models\Category;
use CodePress\CodePosts\Models\Comment;
use CodePress\CodePosts\Models\Post;
use CodePress\CodeUser\Models\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'user',
        'email' => 'user@email',
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'active' => true,
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker){
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph
    ];
});

$factory->define(Comment::class, function (Faker\Generator $faker){
    return [
        'content' => $faker->paragraph
    ];
});
