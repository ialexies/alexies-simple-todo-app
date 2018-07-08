<?php

$factory->define(App\Todo::class, function (Faker\Generator $faker) {
    return [
        // 'todo' => $faker->word,
        'todo' => $faker->sentence(10),
        'completed' => $faker->boolean,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});

