<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BandUrl extends Model
{
  public function band(){
    return $this->belongsTo('App\Band');
  }
}
