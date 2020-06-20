<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'mainurl' => $faker->url,
        'email' => $faker->email,
        'description' => $faker->paragraphs(4),
        'logo' => $faker->imageUrl(),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'twitter' => $faker->url,
        'facebook' => $faker->url,
        'skype' => $faker->url,
        'linkedin' => $faker->url,
        'gplus' => $faker->url,
        'youtube' => $faker->url,
        'flickr' => $faker->url,
        'pinterest' => $faker->url,
        'analytics_code' => $faker->url,


    ];
});
