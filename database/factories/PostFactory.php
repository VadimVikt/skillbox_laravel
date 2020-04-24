<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3,8), true);
<<<<<<< HEAD
    $txt = $faker->realText(rand(1000,3000));
=======
    $txt = $faker->realText(rand(500,1000));
>>>>>>> 7c26c8221be52f34ac67f145b6ec6ce7333f08d7
    $createdAt = $faker->dateTimeBetween('-1 months','1 day');
    return [
        'slug' => Str::slug($title),
        'title' => $title,
        'short_description' => $faker->text(rand(20,60)),
        'body' => $txt,
<<<<<<< HEAD
=======
        'owner_id' => 1,
>>>>>>> 7c26c8221be52f34ac67f145b6ec6ce7333f08d7
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
