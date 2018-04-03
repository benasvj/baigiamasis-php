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

Route::resource('forum', 'PostController');

Route::resource('forumcats', 'CategoryController');

//Komentaramas
Route::resource('comment', 'CommentController',['only'=>['update','destroy']]);

Route::post('/comment/create/{post}', 'CommentController@addPostComment')->name('postcomment.store')->middleware('auth');

//Reply žinutėms
Route::post('/reply/create/{comment}', 'CommentController@addReplyComment')->name('replycomment.store')->middleware('auth');

//Likes
Route::get('/like/{id}', 'CommentController@likeIt')->name('likeIt');
Route::get('/dislike/{id}', 'CommentController@dislikeIt')->name('dislikeIt');

//User profilis
Route::get('/vartotojas', 'UserController@index')->name('user.index');
Route::post('/vartotojas/ikona/{id}', 'UserController@updateIcon')->name('usericon');
Route::post('/vartotojas/vardas/{id}', 'UserController@updateName')->name('username');
Route::post('/vartotojas/elPastas/{id}', 'UserController@updateEmail')->name('useremail');

//Streameriai
Route::get('/streameriai', 'StreamerController@index');

//Naujienos
Route::resource('straipsniai', 'ArticleController');