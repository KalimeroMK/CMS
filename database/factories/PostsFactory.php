<?php

/** @var Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'slug' => $faker->slug,
        'description' => $faker->paragraph(4),
        'meta_description' => $faker->paragraph,
        'featured_image' => 'demo.jpg',
        'views' => $faker->numberBetween(1, 20000),
        'created_at' => $faker->dateTime,
        

    ];
});
