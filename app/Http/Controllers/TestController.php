<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Jobs\GenerateBackup;
use App\Jobs\SitemapGeneratorJob;

class TestController extends Controller
{
    public function test($test){
        if ($test == 'backup'){
            GenerateBackup::dispatch();
            return route('/posts');
        }
        if ($test == 'sitemap'){
            SitemapGeneratorJob::dispatch();
            return route('/about');
        }  
        return route('/');
    }
}
