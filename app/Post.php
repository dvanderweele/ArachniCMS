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
  public function albumlinks(){
    return $this->hasMany('App\AlbumLink');
  }
  public function bandlinks(){
    return $this->hasMany('App\BandLink');
  }
  public function musicianlinks(){
    return $this->hasMany('App\MusicianLink');
  }
  public function songlinks(){
    return $this->hasMany('App\SongLink');
  }
  public function images(){
    return $this->morphToMany('App\Image', 'imageable');
  }
}
