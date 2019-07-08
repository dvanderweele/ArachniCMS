<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $settings = Settings::firstOrFail();
      return view('home')->with('settings', $settings);
    }
}
