<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicianLink extends Model
{
  public function post(){
    return $this->belongsTo('App\Post');
  }

  public function musician(){
    return $this->belongsTo('App\Musician');
  }
}
