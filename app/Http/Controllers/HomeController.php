<?php

namespace App\Http\Controllers;

use App\Comment;
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
      $unapprovedCommentCount = Comment::where('approved', false)->count();
      return view('home')->with('unapprovedCommentCount', $unapprovedCommentCount);
    }
}
