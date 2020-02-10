<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3,8), true);
    $txt = $faker->realText(rand(500,1000));
    $createdAt = $faker->dateTimeBetween('-1 months','1 day');
    return [
        'slug' => Str::slug($title),
        'title' => $title,
        'short_description' => $faker->text(rand(20,60)),
        'body' => $txt,
        'owner_id' => 1,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
