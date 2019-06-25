<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Purifier;

class AboutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $about = About::first();
      if($about != null){
        return redirect()->route('show-about');
      } else {
        return view('about.create');
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
          $fileNameToStore= $filename.'_'.time().'.'.$extension;
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
      return view('about.show')->with('about', $about);
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $about = About::firstOrFail();
      
    }
}
