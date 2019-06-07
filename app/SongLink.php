<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongLink extends Model
{
  public function post(){
    return $this->belongsTo('App\Post');
  }
  public function song(){
    return $this->belongsTo('App\Song');
  }
}