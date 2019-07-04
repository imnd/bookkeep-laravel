<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Invoices;
use Faker\Generator as Faker;

$factory->define(Invoices::class, function (Faker $faker) {
    return [
        'client_id' => $faker->numberBetween(0, 10),
        'contract_num' => $faker->numberBetween(0, 10),
        'number' => $faker->numberBetween(0, 10),
        'sum' => $faker->numberBetween(0, 999),
        'payed' => $faker->numberBetween(0, 999),
        'date' => $faker->date,
    ];
});
