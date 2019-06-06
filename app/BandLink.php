<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BandLink extends Model
{
  public function post(){
    return $this->belongsTo('App\Post');
  }

  public function band(){
    return $this->belongsTo('App\Band');
  }
}
