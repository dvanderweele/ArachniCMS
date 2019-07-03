<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'body' => '<p>'.implode('</p><p>',$faker->paragraphs(7, false)).'</p>',
      'comments_locked' => $faker->boolean($chanceOfGettingTrue = 50),
      'author_id' => User::firstOrFail()->id,
      'views' => $faker->numberBetween($min = 0, $max = 6000),
      'summary' => $faker->optional()->paragraph($nbSentences = 3, $variableNbSentences = true),
      'is_published' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});
