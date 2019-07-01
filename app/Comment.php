<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function getRouteKeyName()
  {
      return 'url_string';
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
  public function post(){
    return $this->belongsTo('App\Post');
  }
}
