<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $settings = Settings::firstOrFail();
      return view('images.index')->with([
        'images' => Image::paginate(10),
        'settings' => $settings
      ]);
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
        'image_file' => 'required|max:1999',
        'image_description' => 'required|min:2'
      ]);

      $image = new Image();
      $image->description = $request->image_description;

      $filenameWithExt = $request->file('image_file')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('image_file')->getClientOriginalExtension();
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      $path = $request->file('image_file')->storeAs('public/storage/img/', $fileNameToStore);

      $image->location = $fileNameToStore;
      $image->save();

      return redirect()->route('list-images');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
      $settings = Settings::firstOrFail();
      return view('images.edit')->with([
        'image' => $image,
        'settings' => $settings
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $request->validate([
        'description' => 'required|min:2'
      ]);
      $image = Image::findOrFail($request->id);
      $image->description = $request->description;
      $image->save();
      return redirect()->route('list-images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $image = Image::findOrFail($request->id);
      $imageables = DB::table('imageables')->where('image_id', $request->id)->get();
      foreach($imageables as $imageable){
        $imageable->delete();
      }
      Storage::delete('public/img/'.$image->location);
      $image->delete();
      return redirect()->route('list-images');
    }
}
