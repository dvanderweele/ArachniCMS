<?php

namespace App\Http\Controllers;

use App\Post;
use App\Settings;
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
    public function create(Post $post)
    {
      $settings = Settings::firstOrFail();
      $youtubevidcodes = YoutubeVidCode::paginate(15);
      return view('youtubevidembeds.create')->with([
        'post' => $post,
        'youtubevidcodes' => $youtubevidcodes,
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
      $post = Post::where('url_string', $request->post_url_string)->firstOrFail();
      $vidcode = YoutubeVidCode::findOrFail($request->vidcode_id);
      $embed = new YoutubeVidEmbed();
      $embed->post_id = $post->id;
      $embed->youtube_vid_code_id = $vidcode->id;
      $embed->save();
      return redirect()->route('edit-post', ['post' => $post->url_string]);
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
      return redirect()->route('edit-post', ['post' => $post->url_string]);
    }
}
