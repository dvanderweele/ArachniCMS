<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'imageable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function albums()
    {
        return $this->morphedByMany('App\Album', 'imageable');
    }
}
