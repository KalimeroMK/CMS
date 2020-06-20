<?php

/** @var Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => Hash::make("admin"),
        'remember_token' => str_random(10),
        'avatar' => $faker->imageUrl(),
        'birthday' => $faker->paragraphs(4),
        
    ];
});
