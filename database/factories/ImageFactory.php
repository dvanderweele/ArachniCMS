<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
      'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'location' => $faker->image('public/storage/img/',640,480, null, false),
    ];
});
