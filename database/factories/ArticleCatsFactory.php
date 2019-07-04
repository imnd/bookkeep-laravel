<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ArticleCats,
    Faker\Generator as Faker;

$factory->define(ArticleCats::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});
