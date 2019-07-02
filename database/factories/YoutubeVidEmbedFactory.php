<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\YoutubeVidCode;
use App\YoutubeVidEmbed;
use Faker\Generator as Faker;

$factory->define(YoutubeVidEmbed::class, function (Faker $faker) {
    return [
      'post_id' => function(){
        return Post::all()->random();
      },
      'youtube_vid_code_id' => function(){
        return YoutubeVidCode::all()->random();
      },
    ];
});
