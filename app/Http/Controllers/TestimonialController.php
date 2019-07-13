<?php

namespace App\Http\Controllers;

use App\Settings;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $settings = Settings::firstOrFail();
      return view('testimonials.create')->with('settings', $settings);
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
        'quote' => 'required',
        'link' => 'nullable|url'
      ]);
      $testimonial = new Testimonial();
      $testimonial->name = $request->name;
      $testimonial->quote = $request->quote;
      $testimonial->link = $request->link;
      $testimonial->save();
      return redirect('/testimonials');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
      $settings = Settings::firstOrFail();
      return view('testimonials.edit')->with([
        'testimonial' => $testimonial,
        'settings' => $settings
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $testimonial = Testimonial::findOrFail($request->id);
      $request->validate([
        'name' => 'required',
        'quote' => 'required',
        'link' => 'nullable|url'
      ]);
      $testimonial->name = $request->name;
      $testimonial->quote = $request->quote;
      $testimonial->link = $request->link;
      $testimonial->save();
      return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
      $testimonial->delete();
      return redirect('/');
    }
}
