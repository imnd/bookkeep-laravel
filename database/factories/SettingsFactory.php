<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Settings;
use Faker\Generator as Faker;

$factory->define(Settings::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'key' => $faker->text,
        'value' => $faker->text,
    ];
});
