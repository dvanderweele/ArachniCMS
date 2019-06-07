<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
  public function songmusicians(){
    return $this->hasMany('App\SongMusician');
  }
  public function albumsongs(){
    return $this->hasMany('App\AlbumSong');
  }
  public function songurls(){
    return $this->hasMany('App\SongUrl');
  }
  public function songlinks(){
    return $this->hasMany('App\SongLink');
  }
}
