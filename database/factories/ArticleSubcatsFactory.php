<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ArticleSubcats;
use Faker\Generator as Faker;

$factory->define(ArticleSubcats::class, function (Faker $faker) {
    return [
        'cat_id' => $faker->numberBetween(0, 10),
        'name' => $faker->text,
    ];
});
