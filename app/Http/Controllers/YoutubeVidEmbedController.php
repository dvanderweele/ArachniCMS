<?php

namespace App\Http\Controllers;

use App\Post;
use App\YoutubeVidCode;
use App\YoutubeVidEmbed;
use Illuminate\Http\Request;

class YoutubeVidEmbedController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $post = Post::findOrFail($id);
      $youtubevidcodes = YoutubeVidCode::paginate(2);
      return view('youtubevidembeds.create')->with([
        'post' => $post,
        'youtubevidcodes' => $youtubevidcodes
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
      $post = Post::findOrFail($request->post_id);
      $vidcode = YoutubeVidCode::findOrFail($request->vidcode_id);
      $embed = new YoutubeVidEmbed();
      $embed->post_id = $post->id;
      $embed->youtube_vid_code_id = $vidcode->id;
      $embed->save();
      return redirect()->route('edit-post', ['id' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\YoutubeVidEmbed  $youtubeVidEmbed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $embed = YoutubeVidEmbed::findOrFail($request->embed_id);
      $post = $embed->post;
      $embed->delete();
      return redirect()->route('edit-post', ['id' => $post->id]);
    }
}
