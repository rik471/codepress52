<?php

use CodePress\CodeCategory\Models\Category;
use CodePress\CodePosts\Models\Comment;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'active' => true
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
