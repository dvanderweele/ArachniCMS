<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $unapproved = Comment::where('approved', false)->paginate(5);
      $approved = Comment::where('approved', true)->paginate(5);
      return view('comments.index')->with([
        'unapproved' => $unapproved,
        'approved' => $approved
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
      $post = Post::where('url_string', $request->post_url_string)->firstOrFail();
      $comment = new Comment();
      $comment->post_id = $post->id;
      if(Auth::check()){
        $request->validate([
          'body' => 'required'
        ]);
        $comment->name = auth()->user()->name;
        $comment->user_id = auth()->user()->id;
        $comment->email = auth()->user()->email;
        $comment->approved = true;
        $comment->body = $request->body;
        $comment->ip_address = $request->ip();
        $comment->save();
        return redirect()->route('show-post', ['post' => $post->url_string]);
      } else {
        $settings = Settings::firstOrFail();
        if($settings->comment_lock_policy){
          return redirect()->route('show-post', ['post' => $post->url_string]);
        }
        if($post->comments_locked){
          return redirect()->route('show-post', ['post' => $post->url_string]);
        }
        $request->validate([
          'name' => 'required|min:2',
          'email' => 'required',
          'body' => 'required|min:2'
        ]);
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->body = $request->body;
        $comment->ip_address = $request->ip();
        $settings = Settings::firstOrFail();
        if($settings->comment_approval_policy){
          $comment->approved = true;
        } else {
          $comment->approved = false;
        }
        $comment->save();
        return redirect()->route('show-post', ['post' => $post->url_string]);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $comment = Comment::findOrFail($request->id);
      if($request->has('approve')){
        $comment->approved = true;
      }
      if($request->has('unapprove')){
        $comment->approved = false;
      }
      $comment->save();
      $post = $comment->post;
      return redirect()->route('show-post', ['post' => $post->url_string]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $comment = Comment::findOrFail($request->id);
      $post = $comment->post;
      $comment->delete();
      return redirect()->route('show-post', ['post' => $post->url_string]);
    }
}
