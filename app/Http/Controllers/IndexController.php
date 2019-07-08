<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function show(){
    $settings = Settings::firstOrFail();
    return view('welcome')->with([
      'settings' => $settings
    ]);
  }
}
