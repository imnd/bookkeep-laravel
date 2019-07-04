<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Articles,
    Faker\Generator as Faker;

$factory->define(Articles::class, function (Faker $faker) {
    return [
        'subcat_id' => $faker->numberBetween(0, 10),
        'name' => $faker->name,
        'unit' => Articles::getUnits()[0],
        'price' => $faker->numberBetween(100, 1000),
        'active' => $faker->numberBetween(0, 1),
    ];
});
