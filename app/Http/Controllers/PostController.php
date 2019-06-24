<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
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
      if(Auth::check())
      { // return all posts, including unpublished
        $posts = Post::latest()->paginate(5);
      } else 
      { // only return published posts
        $posts = Post::where('is_published', true)->latest()->paginate(5);
      }
      return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create');
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
        'is_published' => 'required'
      ]);
      $post->title = $request->title;
      $post->body = Purifier::clean($request->body);
      $post->summary = $request->summary;
      if ($request->is_published == 'unpublished'){
        $post->is_published = false;
      } else if ($request->is_published == 'published'){
        $post->is_published = true;
      } else {
        return back()->withInput();
      }
      $post->author_id = auth()->user()->id;
      $post->save();
      return redirect()->route('show-post', ['id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::findOrFail($id);
      $approved = Comment::where('post_id', $post->id)->where('approved', true)->latest()->paginate(5);
      if($post->is_published)
      { 
        if(Auth::check())
        {
          $unapproved = Comment::where('post_id', $post->id)->where('approved', false)->latest()->paginate(5);
          return view('posts.show', [
            'post' => $post, 
            'approved' => $approved,
            'unapproved' => $unapproved
          ]);
        } else 
        {
          return view('posts.show', [
            'post' => $post, 
            'approved' => $approved
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
            'unapproved' => $unapproved
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
    public function edit($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.edit', ['post' => $post]);
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
      $post = Post::findOrFail($request->id);
      $request->validate([
        'title' => 'required|min:2',
        'body' => 'required|min:2',
        'summary' => 'nullable',
        'is_published' => 'required'
      ]);
      $post->title = $request->title;
      $post->body = Purifier::clean($request->body);
      $post->summary = $request->summary;
      if ($request->is_published == 'unpublished'){
        $post->is_published = false;
      } else if ($request->is_published == 'published'){
        $post->is_published = true;
      } else {
        return back()->withInput();
      }
      $post->save();
      return redirect()->route('show-post', ['id' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $post = Post::findOrFail($request->id)->delete();
      return redirect()->route('list-posts');
    }
}
