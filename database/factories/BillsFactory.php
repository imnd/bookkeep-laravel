<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Bills;
use Faker\Generator as Faker;

$factory->define(Bills::class, function (Faker $faker) {
    return [
        'client_id' => $faker->numberBetween(0, 10),
        'contract_num' => $faker->numberBetween(0, 10),
        'sum' => $faker->numberBetween(0, 100),
        'remainder' => $faker->numberBetween(0, 100),
        'date' => $faker->date,
        'contents' => 'payment',
    ];
});
