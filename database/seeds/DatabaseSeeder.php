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
          PostsTableSeeder::class,
          CommentsTableSeeder::class,
          ImagesTableSeeder::class,
          ImageablesTableSeeder::class,
          YoutubeVidEmbedsTableSeeder::class,
        ]);
    }
}
