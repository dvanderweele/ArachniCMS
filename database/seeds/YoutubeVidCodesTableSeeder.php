<?php

use Illuminate\Database\Seeder;

class YoutubeVidCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\YoutubeVidCode::class, 2)->create();
    }
}
