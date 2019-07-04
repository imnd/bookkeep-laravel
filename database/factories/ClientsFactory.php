<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Clients;
use Faker\Generator as Faker;

$factory->define(Clients::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'region_id' => $faker->numberBetween(0, 10),
        'telephone' => $faker->numberBetween(1, 9) . $faker->numerify('#########'),
        'fax' => $faker->numberBetween(1, 9) . $faker->numerify('#########'),
        'contact_fio' => $faker->name,
        'contact_post' => $faker->words(2, true),
        'account' => $faker->numberBetween(1, 9) . $faker->numerify('#########'),
        'bank' => $faker->text,
        'INN' => $faker->numberBetween(1, 9) . $faker->numerify('#########'),
        'KPP' => $faker->numberBetween(1, 9) . $faker->numerify('#########'),
        'BIK' => $faker->numberBetween(1, 9) . $faker->numerify('#########'),
        'sort' => $faker->numberBetween(0, 999),
        'active' => $faker->numberBetween(0, 1),
    ];
});

