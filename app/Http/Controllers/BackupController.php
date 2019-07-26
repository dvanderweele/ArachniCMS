<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
  public function index(){
    $settings = Settings::firstOrFail();
    $files = Storage::disk('backup')->files('bucket');
    return view('backups.index')->with([
      'settings' => $settings,
      'files' => $files
    ]);
  }

  public function show(){
    
  }
}