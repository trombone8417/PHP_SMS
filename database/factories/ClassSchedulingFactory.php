<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassScheduling;
use Faker\Generator as Faker;

$factory->define(ClassScheduling::class, function (Faker $faker) {

    return [
        'course_id' => $faker->randomDigitNotNull,
        'level_id' => $faker->randomDigitNotNull,
        'shift_id' => $faker->randomDigitNotNull,
        'classroom_id' => $faker->randomDigitNotNull,
        'batch_id' => $faker->randomDigitNotNull,
        'day_id' => $faker->randomDigitNotNull,
        'time_id' => $faker->randomDigitNotNull,
        'teacher_id' => $faker->randomDigitNotNull,
        'start_time' => $faker->word,
        'end_time' => $faker->word,
        'status' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
