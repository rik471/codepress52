<?php

use CodePress\CodeCategory\Models\Category;

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
