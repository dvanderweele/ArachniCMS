<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Jobs\GenerateBackup;
use App\Jobs\SitemapGeneratorJob;

class TestController extends Controller
{
    public function test($type){
        if ($type == 'backup'){
            GenerateBackup::dispatch();
            return redirect()->route('list-posts');
        }
        if ($type == 'sitemap'){
            SitemapGeneratorJob::dispatch();
            return redirect()->route('show-about');
        }  
        return redirect()->route('create-contact');
    }
}
