<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumLink extends Model
{
  public function post(){
    return $this->belongsTo('App\Post');
  }
  public function album(){
    return $this->belongsTo('App\Album');
  }
}
