<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\YoutubeVidCode;
use Faker\Generator as Faker;

$factory->define(YoutubeVidCode::class, function (Faker $faker) {
    $code_hoard = [
        'vid one' => 'WzW9ichudto',
        'vid two' => 'BFzQE1Q1m6Q',
        'vid three' => 'iaFK6AHhU8s',
        'vid four' => 'MF0jFKvS4SI',
        'vid five' => 'WqSTXuJeTks'
    ];

    return [
        'name' => array_rand($code_hoard),
        'vidcode' => $code_hoard[array_rand($code_hoard)]
    ];
});
