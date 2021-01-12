<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {

    return [
        'student_id' => $faker->randomDigitNotNull,
        'fee_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'paid' => $faker->randomDigitNotNull,
        'transaction_date' => $faker->word,
        'remark' => $faker->text,
        'description' => $faker->text,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
