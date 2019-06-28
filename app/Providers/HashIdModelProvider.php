<?php

namespace App\Providers;

use App\Post;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class HashIdModelProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      Post::created(function($model) {
        $generator = new Hashids(Post::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
    }
}
