<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumSong extends Model
{
  public function album(){
    return $this->belongsTo('App\Album');
  }
  public function song(){
    return $this->belongsTo('App\Song');
  }
}
