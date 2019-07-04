<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Purchases;
use Faker\Generator as Faker;

$factory->define(Purchases::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(0, 10),
        'sum' => $faker->numberBetween(0, 999),
        'date' => $faker->date,
    ];
});
