<?php

use Illuminate\Database\Seeder;

class ImageablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Imageable::class, 75)->create();
    }
}
