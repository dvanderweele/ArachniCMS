<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YoutubeVidEmbed extends Model
{
  public function youtubevidcode(){
    return $this->belongsTo('App\YoutubeVidCode');
  }

  public function post(){
    return $this->belongsTo('App\Post');
  }
}
