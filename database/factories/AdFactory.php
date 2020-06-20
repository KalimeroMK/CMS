<?php

/** @var Factory $factory */

use App\Models\Ad;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'position' => 'header',
        'code' => $faker->paragraphs,
    ];
});
