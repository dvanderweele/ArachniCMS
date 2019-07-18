<?php

namespace App\Http\Controllers;

use App\Settings;
use Carbon\Carbon;
use App\Mail\ContactFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
      $email = Settings::firstOrFail()->contact_form_email;
      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'contact_body' => 'required|max:2000'
      ]);
      $submission = collect([
        'name' => $request->name,
        'email' => $request->email,
        'contact_body' => $request->contact_body,
        'time' => Carbon::now()->toDateTimeString()
      ]);
      Mail::to($email)->queue(new ContactFormSubmission($submission));
      return redirect('/posts');
    }
}
