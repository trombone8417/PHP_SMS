<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassAssigning;
use Faker\Generator as Faker;

$factory->define(ClassAssigning::class, function (Faker $faker) {

    return [
        'course_id' => $faker->randomDigitNotNull,
        'level_id' => $faker->randomDigitNotNull,
        'shift_id' => $faker->randomDigitNotNull,
        'classroom_id' => $faker->randomDigitNotNull,
        'batch_id' => $faker->randomDigitNotNull,
        'day_id' => $faker->randomDigitNotNull,
        'time_id' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
