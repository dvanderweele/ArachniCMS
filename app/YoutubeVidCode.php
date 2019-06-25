<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YoutubeVidCode extends Model
{
  public function youtubevidembeds(){
    return $this->hasMany('App\YoutubeVidEmbed', 'youtube_vid_code_id');
  }
}
