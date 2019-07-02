<?php

use Illuminate\Database\Seeder;

class YoutubeVidEmbedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\YoutubeVidEmbed::class, 15)->create();
    }
}
