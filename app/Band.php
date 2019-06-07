<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
  public function bandlinks(){
    return $this->hasMany('App\BandLink');
  }

  public function bandmusicians(){
    return $this->hasMany('App\BandMusician');
  }

  public function bandurls(){
    return $this->hasMany('App\BandUrl');
  }
}
