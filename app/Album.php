<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  public function albumgenres(){
    return $this->hasMany('App\AlbumGenre');
  }
  public function albumlinks(){
    return $this->hasMany('App\AlbumLink');
  }
  public function albumurls(){
    return $this->hasMany('App\AlbumUrl');
  }
  public function albumsongs(){
    return $this->hasMany('App\AlbumSong');
  }
}
