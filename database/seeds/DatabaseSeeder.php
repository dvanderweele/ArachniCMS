<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          UsersTableSeeder::class,
          SettingsTableSeeder::class,
          AboutTableSeeder::class,
          PostsTableSeeder::class,
          CommentsTableSeeder::class,
          ImagesTableSeeder::class,
          ImageablesTableSeeder::class,
          YoutubeVidCodesTableSeeder::class,
          YoutubeVidEmbedsTableSeeder::class,
        ]);
    }
}
