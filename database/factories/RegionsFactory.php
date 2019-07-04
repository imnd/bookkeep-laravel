<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Regions;
use Faker\Generator as Faker;

$factory->define(Regions::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});
