<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'password' => Str::random(10),
      'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'CPF' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
      'lesson_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
      'rent_price' => $faker-> randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
      'description' => $faker->text($maxNbChars = 100),
      'certification' => $faker->text($maxNbChars = 20),
      'instruments' => $faker->text($maxNbChars=10),
      'remember_token' => Str::random(10),
    ];
});
