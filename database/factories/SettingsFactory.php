<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Settings;
use Faker\Generator as Faker;

$factory->define(Settings::class, function (Faker $faker) {
    return [
      'view_count_policy' => true,
      'comment_lock_policy' => false,
      'comment_approval_policy' => false,
      'landing_header' => null,
      'landing_tagline' => null,
      'text_selection_policy' => false,
      'contact_form_email' => function(){
        return User::firstOrFail()->email;
      },
    ];
});
