<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
  public function bandmusicians(){
    return $this->hasMany('App\BandMusician');
  }

  public function songmusicians(){
    return $this->hasMany('App\SongMusician');
  }

  public function musicianlinks(){
    return $this->hasMany('App\MusicianLink');
  }

  public function musicianurls(){
    return $this->hasMany('App\MusicianURl');
  }
}
