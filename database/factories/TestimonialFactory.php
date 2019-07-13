<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
      'name' => $faker->name($gender = 'male'|'female').' of '.$faker->company.' '.$faker->companySuffix,
      'quote' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
      'link' => 'https://www.'.$faker->domainName,
    ];
});
