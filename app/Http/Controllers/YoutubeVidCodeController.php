<?php

namespace App\Http\Controllers;

use App\YoutubeVidCode;
use App\YoutubeVidEmbed;
use Illuminate\Http\Request;

class YoutubeVidCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $codes = YoutubeVidCode::latest()->paginate(20);
      return view('youtubevidcodes.index')->with('codes', $codes);
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
      $request->validate([
        'name' => 'required|unique:youtube_vid_codes',
        'code' => 'required'
      ]);
      $vidcode = new YoutubeVidCode();
      $vidcode->name = $request->name;
      $vidcode->vidcode = $request->code;
      $vidcode->save();
      return redirect()->route('list-vidcodes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\YoutubeVidCode  $youtubeVidCode
     * @return \Illuminate\Http\Response
     */
    public function show(YoutubeVidCode $youtubeVidCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\YoutubeVidCode  $youtubeVidCode
     * @return \Illuminate\Http\Response
     */
    public function edit(YoutubeVidCode $youtubeVidCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\YoutubeVidCode  $youtubeVidCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YoutubeVidCode $youtubeVidCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\YoutubeVidCode  $youtubeVidCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $vidcode = YoutubeVidCode::findOrFail($request->id);
      $vidembeds = $vidcode->youtubevidembeds;
      foreach($vidembeds as $vid){
        $vid->delete();
      }
      $vidcode->delete();
      return redirect()->route('list-vidcodes');
    }
}
