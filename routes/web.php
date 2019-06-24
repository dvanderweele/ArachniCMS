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

Route::get('/test', function(){
  return view('auth.passwords.reset');
});

Route::get('/home', 'HomeController@index');

Route::get('/posts',            'PostController@index')->name('list-posts');
Route::get('/posts/create',     'PostController@create')->middleware('auth')->name('create-post');
Route::post('/posts',           'PostController@store')->middleware('auth');
Route::get('/posts/{id}',       'PostController@show')->name('show-post');
Route::get('/posts/{id}/edit',  'PostController@edit')->middleware('auth');
Route::patch('/posts',          'PostController@update')->middleware('auth');
Route::delete('/posts',         'PostController@destroy')->middleware('auth');

Route::get('/comments',         'CommentController@index')->middleware('auth');
Route::post('/comments',        'CommentController@store');
Route::patch('/comments',      'CommentController@update')->middleware('auth');
Route::delete('/comments',      'CommentController@destroy')->middleware('auth');