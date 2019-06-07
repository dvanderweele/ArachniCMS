<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongUrl extends Model
{
  public function song(){
    return $this->belongsTo('App\Song');
  }
}
