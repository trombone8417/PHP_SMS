<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Academic;
use Faker\Generator as Faker;

$factory->define(Academic::class, function (Faker $faker) {

    return [
        'academic_year' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
