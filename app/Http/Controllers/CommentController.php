<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = Post::findOrFail($request->post_id);
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
        return redirect()->route('show-post', ['id' => $post->id]);
      } else {
        $request->validate([
          'name' => 'required|min:2',
          'email' => 'required',
          'body' => 'required|min:2'
        ]);
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->body = $request->body;
        $comment->ip_address = $request->ip();
        $comment->save();
        return redirect()->route('show-post', ['id' => $post->id]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
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
      return redirect()->route('show-post', ['id' => $post->id]);
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
      return redirect()->route('show-post', ['id' => $post->id]);
    }
}
