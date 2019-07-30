<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => 'About Us',
        'body' => '<p>'.implode('</p><p>',$faker->paragraphs(7, false)).'</p>',
        'image_description' => 'A picture related to the organization.',
        'image_location' => $faker->image('public/storage/',640,480, null, false),
    ];
});
