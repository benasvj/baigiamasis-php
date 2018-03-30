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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/forum', 'CategoryController@index');

Route::resource('forum', 'PostController');

Route::resource('forumcats', 'CategoryController');

Route::resource('comment', 'CommentController',['only'=>['update','destroy']]);

Route::post('/comment/create/{post}', 'CommentController@addPostComment')->name('postcomment.store')->middleware('auth');