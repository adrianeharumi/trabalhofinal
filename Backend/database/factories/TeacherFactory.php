<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
      'user_id' => factory('App\User')->create()->id,
      'lesson_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 400),
      'rent_price' => $faker-> randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
      'description' => $faker->text($maxNbChars = 100),
      'district' => 'Copacabana',
      'zone' => 'Sul',
      'certification' => 'UFRJ',
      'instruments' => 'Cello',
      'remember_token' => Str::random(10),
    ];
});
