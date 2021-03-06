<?php

namespace App\Jobs;

use Spatie\Sitemap\SitemapGenerator;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SitemapGeneratorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $robots = public_path('robots.txt');
      $sitemapurl = config('app.url') . '/sitemap.xml';
      $content = "Sitemap: " . $sitemapurl . "\nUser-agent: *" . "\nDisallow: ";
      file_put_contents($robots, $content);
      SitemapGenerator::create(config('app.url'))
      ->writeToFile(public_path('sitemap.xml'));
      $posts = Post::where('is_published', true)->get();
      foreach($posts as $post){
        $post->views = $post->views - 1;
        $post->save();
      }
    }
}
