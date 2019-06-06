<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BandMusician extends Model
{
  public function band(){
    return $this->belongsTo('App\Band');
  }
}
