<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Jobs\GenerateBackup;
use App\Jobs\SitemapGeneratorJob;

class TestController extends Controller
{
    public function test($type){
        dd($type);
        if ($type == 'backup'){
            GenerateBackup::dispatch();
            return route('/posts');
        }
        if ($type == 'sitemap'){
            SitemapGeneratorJob::dispatch();
            return route('/about');
        }  
        return route('/');
    }
}
