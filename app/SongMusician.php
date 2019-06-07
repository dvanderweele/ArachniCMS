<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongMusician extends Model
{
  public function song(){
    return $this->belongsTo('App\Song');
  }

  public function musician(){
    return $this->belongsTo('App\Musician');
  }
}
