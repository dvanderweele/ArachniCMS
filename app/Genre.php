<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  public function albumgenres(){
    return $this->hasMany('App\AlbumGenre');
  }
}
