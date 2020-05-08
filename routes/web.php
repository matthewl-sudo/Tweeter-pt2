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

Auth::routes();

Route::get('/tweet', 'TweetsController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index')->name('home');

Route::post('/create-tweet', 'TweetsController@saveTweet');
<<<<<<< HEAD
Route::post('/delete-tweet{id}', 'TweetsController@deleteTweet');
=======
Route::post('/destroy-tweet/{id}', 'TweetsController@deleteTweet');
>>>>>>> a6b6796094882a6c56f2925a5970a47bc31da600
Route::post('/update-tweet{id}', 'TweetsController@updateTweet');

Route::post('/comments', 'TweetsController@saveComment');
Route::post('/delete-comment{id}','TweetsController@deleteComment');

Route::get('/tweets/{id}/like', 'TweetsController@likeTweet');
// Route::get('/tweets/{id}/like', 'HomeController@showLike');

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/profile', 'HomeController@showUserprofile')->name('profile');


Route::post('/profile', 'TweetsController@saveUserprofile')->name('profile');
Route::get('/edit-profile', function () {
    return view('edit-profile');
});
Route::post('/edit-profile', 'TweetsController@saveUserprofile')->name('edit-profile');

Route::post('/follow{id}', 'TweetsController@saveFollowing');
