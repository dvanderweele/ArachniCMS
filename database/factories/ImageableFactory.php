<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
Use App\Image;
Use App\Imageable;
use Faker\Generator as Faker;

$factory->define(Imageable::class, function (Faker $faker) {
    return [
      'image_id' => function(){
        return Image::all()->random();
      },
      'imageable_id' => function(){
        return Post::all()->random();
      },
      'imageable_type' => 'App\Post',
    ];
});
