<?php

namespace App\Http\Controllers;

use App\Post;
use App\Image;
use App\Settings;
use App\Imageable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class ImageableController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
      $settings = Settings::firstOrFail();
      if($type == 'post')
      {
        $post = Post::where('url_string', $id)->firstOrFail();
        $imageables = Imageable::where('imageable_type', 'App\Post')->get();
        $images = Image::get();
        foreach($imageables as $imageable){
          if($imageable->imageable_id == $post->id){
            $images = $images->whereNotIn('id', [$imageable->image_id]);
          }
        }
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 10;
        $currentPageSearchResults = $images->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $images = new Paginator($currentPageSearchResults, count($images), $perPage, null, [
          'path' => '/imageables/post/'.$post->url_string.'/create',
        ]);
        return view('imageable.create')->with([
          'post' => $post,
          'images' => $images,
          'settings' => $settings
        ]);
      } elseif($type == 'album')
      {
        return;
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
        'imageable_type' => 'required',
        'imageable_id' => 'required',
        'image_id' => 'required'
      ]);
      $image = Image::findOrFail($request->image_id);
      if($request->imageable_type == 'App\Post'){
        $post = Post::where('url_string', $request->imageable_id)->firstOrFail();
        $imageable = Imageable::where([
          ['imageable_type', '=', 'App\Post'],
          ['imageable_id', '=', $post->id],
          ['image_id', '=', $image->id],
        ])->get();
        if(count($imageable) > 0){
          // this imageable already exists, deny request
          return redirect()->route('create-imageable', ['type' => 'post', 'id' => $post->url_string]);
        } else {
          // this imageable doesn't exist, let's make it
          $imageable = new Imageable();
          $imageable->imageable_type = 'App\Post';
          $imageable->imageable_id = $post->id;
          $imageable->image_id = $image->id;
          $imageable->save();
          return redirect()->route('create-imageable', ['type' => 'post', 'id' => $post->url_string]);
        }
      } elseif ($request->imageable_type == 'App\Album'){
        return;
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $request->validate([
        'imageable_type' => 'required',
        'imageable_id' => 'required',
        'image_id' => 'required'
      ]);
      $image = Image::findOrFail($request->image_id);
      if($request->imageable_type == 'App\Post'){
        $post = Post::findOrFail($request->imageable_id);
        $imageable = Imageable::where([
          ['imageable_type', '=', 'App\Post'],
          ['imageable_id', '=', $post->id],
          ['image_id', '=', $image->id],
        ])->first();
        if($imageable->count()){
          // this imageable does exist, delete it
          $imageable->delete();
          return redirect()->route('edit-post', ['post' => $post->url_string]);
        } else {
          // this imageable doesn't exist, let's redirect
          return redirect()->route('edit-post', ['post' => $post->url_string]);
        }
      } elseif ($request->imageable_type == 'App\Album'){
        return;
      }
    }
}
