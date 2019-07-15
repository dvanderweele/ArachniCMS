<?php

namespace App\Http\Controllers;

use App\Post;
use App\Settings;
use App\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function show(){
    $settings = Settings::firstOrFail();
    $testimonials = Testimonial::get();
    $bestposts = new Post();
    $bestposts = $bestposts->bestposts();
    return view('welcome')->with([
      'settings' => $settings,
      'testimonials' => $testimonials,
      'bestposts' => $bestposts
    ]);
  }
}
