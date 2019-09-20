<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Settings;
use App\Imageable;
use App\YoutubeVidEmbed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $settings = Settings::firstOrFail();
      if(Auth::check())
      { // return all posts, including unpublished
        $posts = Post::latest()->paginate(5);
      } else 
      { // only return published posts
        $posts = Post::where('is_published', true)->latest()->paginate(5);
      }
      return view('posts.index', ['posts' => $posts, 'settings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $settings = Settings::firstOrFail();
      return view('posts.create')->with('settings', $settings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = new Post();
      $request->validate([
        'title' => 'required|min:2',
        'body' => 'required|min:2',
        'summary' => 'nullable',
        'is_published' => 'required',
        'comments_locked' => 'required'
      ]);
      $settings = Settings::firstOrFail();
      $post->title = $request->title;
      $post->body = Purifier::clean($request->body);
      $post->summary = $request->summary;
      if($settings->comment_lock_policy){
        $post->comments_locked = true;
      } else {
        $post->comments_locked = $request->comments_locked == "true" ? true : false;
      }
      if ($request->is_published == 'unpublished'){
        $post->is_published = false;
      } else if ($request->is_published == 'published'){
        $post->is_published = true;
      } else {
        return back()->withInput();
      }
      $post->author_id = auth()->user()->id;
      $post->save();
      return redirect()->route('show-post', ['post' => $post->url_string]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Request $request)
    {
      $approved = Comment::where('post_id', $post->id)->where('approved', true)->latest()->paginate(5);
      $settings = Settings::firstOrFail();
      if($post->is_published)
      { 
        if(Auth::check())
        {
          $unapproved = Comment::where('post_id', $post->id)->where('approved', false)->latest()->paginate(5);
          return view('posts.show', [
            'post' => $post, 
            'approved' => $approved,
            'unapproved' => $unapproved, 
            'settings' => $settings
          ]);
        } else 
        {
          if($request->ip() != $request->server('SERVER_ADDR')){
            $post->increment('views', 1);
          }
          return view('posts.show', [
            'post' => $post, 
            'approved' => $approved, 
            'settings' => $settings
          ]);
        }
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
      } else 
      {
        if(Auth::check())
        {
          $unapproved = Comment::where('post_id', $post->id)->where('approved', false)->latest()->paginate(5);
          return view('posts.show', [
            'post' => $post, 
            'approved' => $approved,
            'unapproved' => $unapproved, 
            'settings' => $settings
          ]);
        } else 
        {
          return redirect()->route('list-posts');
        }
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $settings = Settings::firstOrFail();
      return view('posts.edit', [
        'post' => $post,
        'settings' => $settings
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $post = Post::where('url_string', $request->url_string)->firstOrFail();
      $request->validate([
        'title' => 'required|min:2',
        'body' => 'required|min:2',
        'summary' => 'nullable',
        'is_published' => 'required',
        'comments_locked' => 'required'
      ]);
      $post->title = $request->title;
      $post->body = Purifier::clean($request->body);
      $post->summary = $request->summary;
      $post->comments_locked = $request->comments_locked == "true" ? true : false;
      if ($request->is_published == 'unpublished'){
        $post->is_published = false;
      } else if ($request->is_published == 'published'){
        $post->is_published = true;
      } else {
        return back()->withInput();
      }
      $post->save();
      return redirect()->route('show-post', ['post' => $post->url_string]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $post = Post::where('url_string', $request->url_string)->firstOrFail();
      foreach($post->comments as $comment){
        $comment->delete();
      }
      $imageables = Imageable::where('imageable_type', 'App\Post')->where('imageable_id', $post->id)->get();
      foreach($imageables as $img){
        $img->delete();
      }
      $youtubevidembeds = YoutubeVidEmbed::where('post_id', $post->id)->get();
      foreach($youtubevidembeds as $embed){
        $embed->delete();
      }
      $post->delete();
      return redirect()->route('list-posts');
    }

    
}
