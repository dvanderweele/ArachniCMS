<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateBackup implements ShouldQueue
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
      if(Storage::disk('backup')->exists('latest.zip')){
        // clean up old files before generating new backup
        Storage::disk('backup')->delete('latest.zip');
        $dumps = Storage::files(database_path('snapshots'));
        if(count($dumps)){
          Storage::delete($dumps);
        }
      }
      /**
       * GENERATE BACKUP FILES
       */
      // dump database
      Artisan::call('snapshot:create');
      $dump = array_pop(Storage::files(database_path('snapshots')));
      // create latest.zip
      $zipname = 'latest.zip';
      $zip = new ZipArchive;
      $zip->open($zipname, ZipArchive::CREATE);
      $zip->addFile($dump);

      $images = Storage::allFiles(storage_path('app/public/'));
      foreach($images as $img){
        $zip->addFile($img);
      }

      $zip->close();
      Storage::disk('backup')->put('latest.zip', $zip);
    }
}
