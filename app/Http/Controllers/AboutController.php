<?php

namespace App\Http\Controllers;

use Purifier;
use App\About;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $settings = Settings::firstOrFail();
      $about = About::first();
      if($about != null){
        return redirect()->route('show-about');
      } else {
        return view('about.create')->with('settings', $settings);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $about = About::first();
      if($about != null){
        return redirect()->route('show-about');
      }
      $request->validate([
        'title' => 'required|min:2',
        'about_body' => 'required|min:2',
        'image_file' => 'image|nullable|max:1999',
        'image_description' => 'nullable'
      ]);
      $about = new About();
      if($request->hasFile('image_file'))
      {
        if($request->image_description == null){
          return redirect()->back();
        } else {
          $about->title = $request->title;
          $about->body = Purifier::clean($request->about_body);

          $filenameWithExt = $request->file('image_file')->getClientOriginalName();
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('image_file')->getClientOriginalExtension();
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          $path = $request->file('image_file')->storeAs('public', $fileNameToStore);

          $about->image_location = $fileNameToStore;
          $about->image_description = $request->image_description;
          $about->save();
        }
      } else 
      {
        $about->title = $request->title;
        $about->body = Purifier::clean($request->about_body);
        $about->save();
      }
      return redirect()->route('show-about');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $about = About::first();
      $settings = Settings::firstOrFail();
      return view('about.show')->with([
        'about' => $about,
        'settings' => $settings
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $about = About::firstOrFail();
      $settings = Settings::firstOrFail();
      return view('about.edit')->with([
        'about' => $about,
        'settings' => $settings,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $about = About::firstOrFail();
      $request->validate([
        'title' => 'required|min:2',
        'body' => 'required|min:2',
        'image_file' => 'image|nullable|max:1999',
        'image_description' => 'nullable'
      ]);
      $about->title = $request->title;
      $about->body = Purifier::clean($request->body);
      if($request->hasFile('image_file'))
      {
        if($request->image_description == null){
          return redirect()->back();
        } else {
          if ($about->image_location != null)
          {
            Storage::delete($about->image_location);
          }
          //now let's save the new image and its info
          $filenameWithExt = $request->file('image_file')->getClientOriginalName();
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('image_file')->getClientOriginalExtension();
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          $path = $request->file('image_file')->storeAs('public', $fileNameToStore);

          $about->image_location = $fileNameToStore;
          $about->image_description = $request->image_description;
        }
      }
      $about->save();
      return redirect()->route('show-about');
    }
}
