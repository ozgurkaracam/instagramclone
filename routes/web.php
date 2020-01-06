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
Route::get('/home','HomeController@index')->name('home.index');
Route::get('/profile/{user}/followers','FollowController@followers')->name('profile.followers');
Route::get('/profile/{user}/following','FollowController@following')->name('profile.following');
Route::post('/profile/{user}/follow','FollowController@follow')->name('follow');
Route::post('/profile/{user}/unfollow','FollowController@unfollow')->name('unfollow');
Route::get('p/{id}/comments','CommentController@show')->name('comments');
Route::post('p/{id}/like','PostController@likepost')->name('likepost');
Route::post('p/{id}/unlike','PostController@unlikepost')->name('unlikepost');
Route::post('p/{id}/comments','CommentController@store')->name('comments.store');
Route::resource('p','PostController');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::resource('profile','ProfilesController');


