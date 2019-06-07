<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumUrl extends Model
{
  public function album(){
    return $this->belongsTo('Album');
  }
}
