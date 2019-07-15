<?php

namespace App;

use App\User;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Feedable
{
  public function toFeedItem()
  {
      return FeedItem::create([
          'id' => 'posts/'.$this->url_string,
          'title' => $this->title,
          'summary' => $this->summary == '' ? 'No summary' : $this->summary,
          'body' => $this->body,
          'updated' => $this->updated_at,
          'link' => url("/posts/{$this->url_string}"),
          'author' => $this->user->name,
      ]);
  }

  public static function getFeedItems()
  {
    return Post::where('is_published', true)->get();
  }

  public function getRouteKeyName()
  {
      return 'url_string';
  }

  public function user(){
    return $this->belongsTo('App\User', 'author_id');
  }
  public function youtubevidembeds(){
    return $this->hasMany('App\YoutubeVidEmbed');
  }
  public function comments(){
    return $this->hasMany('App\Comment');
  }
  public function images(){
    return $this->morphToMany('App\Image', 'imageable');
  }

  public function bestposts(){
    if($this->count() < 3){
      return $this->where('is_published', true)->whereNotNull('summary')->orderBy('views', 'desc')->take(2)->get();
    } else if ($this->count() < 2) {
      return $this->where('is_published', true)->whereNotNull('summary')->orderBy('views', 'desc')->take(1)->get();
    } else if ($this->count() < 1) {
      return null;
    } else {
      return $this->where('is_published', true)->whereNotNull('summary')->orderBy('views', 'desc')->take(3)->get();
    }
  }
}
