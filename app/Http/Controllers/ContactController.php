<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $settings = Settings::firstOrFail();
      return view('contact.create')->with('settings', $settings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'contact-body' => 'required'
      ]);
      
    }
}
