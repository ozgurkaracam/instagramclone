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
Route::post('/profile/{user}/follow','FollowController@follow')->name('follow');
Route::post('/profile/{user}/unfollow','FollowController@unfollow')->name('unfollow');
Route::resource('p','PostController');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::resource('profile','ProfilesController');


