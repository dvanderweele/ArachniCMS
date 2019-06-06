<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function youtubevidembeds(){
    return $this->hasMany('App\YoutubeVidEmbeds');
  }
  public function comments(){
    return $this->hasMany('App\Comment');
  }
  public function albumlinks(){
    return $this->hasMany('App\AlbumLink');
  }
  public function bandlinks(){
    return $this->hasMany('App\BandLink');
  }
  public function musicianlinks(){
    return $this->hasMany('App\MusicianLink');
  }
  public function songlinks(){
    return $this->hasMany('App\SongLink');
  }
}
