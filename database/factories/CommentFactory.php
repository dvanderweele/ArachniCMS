<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Post;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
      'user_id' => $faker->optional()->passthrough(function(){
        return User::firstOrFail()->id;
      }),
      'post_id' => function(){
        return Post::all()->random();
      },
      'name' => $faker->name($gender = 'male'|'female'),
      'body' => $faker->paragraph($nbSentences = 15, $variableNbSentences = true),
      'email' => $faker->email,
      'approved' => $faker->boolean($chanceOfGettingTrue = 50),
      'ip_address' => $faker->ipv4,
    ];
});
