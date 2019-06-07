<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumGenre extends Model
{
  public function album(){
    return $this->belongsTo('App\Album');
  }
  public function genre(){
    return $this->belongsTo('App\Genre');
  }
}
