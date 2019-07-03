<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::feeds();

Route::get('/test', function(){
  return view('auth.passwords.reset');
});

Route::get('/home', 'HomeController@index');

Route::get('/about',                      'AboutController@show')->name('show-about');
Route::get('/about/create',               'AboutController@create')->name('create-about')->middleware('auth');
Route::post('/about',                     'AboutController@store')->middleware('auth');
Route::get('/about/edit',                 'AboutController@edit')->middleware('auth');
Route::patch('/about',                    'AboutController@update')->middleware('auth');
Route::delete('/about',                   'AboutController@destroy')->middleware('auth');

Route::get('/contact',                    'ContactController@show')->name('show-contact');

Route::get('/posts',                      'PostController@index')->name('list-posts');
Route::get('/posts/create',               'PostController@create')->middleware('auth')->name('create-post');
Route::post('/posts',                     'PostController@store')->middleware('auth');
Route::get('/posts/{post}',                 'PostController@show')->name('show-post');
Route::get('/posts/{post}/edit',            'PostController@edit')->middleware('auth')->name('edit-post');
Route::patch('/posts',                    'PostController@update')->middleware('auth');
Route::delete('/posts',                   'PostController@destroy')->middleware('auth');

Route::get('/comments',                   'CommentController@index')->middleware('auth');
Route::post('/comments',                  'CommentController@store');
Route::patch('/comments',                 'CommentController@update')->middleware('auth');
Route::delete('/comments',                'CommentController@destroy')->middleware('auth');

Route::get('/youtubevidcodes',            'YoutubeVidCodeController@index')->middleware('auth')->name('list-vidcodes');
Route::post('/youtubevidcodes',           'YoutubeVidCodeController@store')->middleware('auth');
Route::delete('/youtubevidcodes',         'YoutubeVidCodeController@destroy')->middleware('auth');

Route::get('/youtubevidembeds/{post}',    'YoutubeVidEmbedController@create')->middleware('auth');
Route::post('/youtubevidembeds',          'YoutubeVidEmbedController@store')->middleware('auth');
Route::delete('/youtubevidembeds',        'YoutubeVidEmbedController@destroy')->middleware('auth');

Route::get('/images',                       'ImageController@index')->middleware('auth')->name('list-images');
Route::post('/images',                      'ImageController@store')->middleware('auth');
Route::get('/images/{image}/edit',          'ImageController@edit')->middleware('auth');
Route::patch('/images',                     'ImageController@update')->middleware('auth');
Route::delete('/images',                    'ImageController@destroy')->middleware('auth');

Route::get('/imageables/{type}/{id}/create', 'ImageableController@create')->middleware('auth')->name('create-imageable');
Route::post('/imageables',                   'ImageableController@store')->middleware('auth');
Route::delete('/imageables',                 'ImageableController@destroy')->middleware('auth');

Route::get('/settings',                       'SettingsController@show')->middleware('auth')->name('show-settings');
Route::put('/settings',                     'SettingsController@update')->middleware('auth');