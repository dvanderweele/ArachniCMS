<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicianUrl extends Model
{
  public function musician(){
    return $this->belongsTo('App\Musician');
  }
}
