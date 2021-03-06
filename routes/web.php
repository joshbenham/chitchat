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

Route::get('home', 'HomeController@index');

Route::get('threads', 'ThreadController@index')->name('threads');
Route::get('threads/create', 'ThreadController@create');
Route::get('threads/search', 'SearchController@show');
Route::get('threads/{channel}/{thread}', 'ThreadController@show');
Route::patch('threads/{channel}/{thread}', 'ThreadController@update');
Route::delete('threads/{channel}/{thread}', 'ThreadController@destroy');
Route::post('threads', 'ThreadController@store')->middleware('must-be-confirmed');
Route::get('threads/{channel}', 'ThreadController@index');

Route::post('locked-threads/{thread}', 'LockedThreadController@store')->name('locked-thread.store')->middleware('admin');
Route::delete('locked-threads/{thread}', 'LockedThreadController@destroy')->name('locked-thread.destroy')->middleware('admin');

Route::get('threads/{channel}/{thread}/replies', 'ReplyController@index');
Route::post('threads/{channel}/{thread}/replies', 'ReplyController@store');
Route::patch('replies/{reply}', 'ReplyController@update');
Route::delete('replies/{reply}', 'ReplyController@destroy')->name('replies.destroy');

Route::post('replies/{reply}/best', 'BestReplyController@store')->name('best-reply.store');

Route::post('threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionController@store')->middleware('auth');
Route::delete('threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionController@destroy')->middleware('auth');

Route::post('replies/{reply}/favourites', 'FavouriteController@store');
Route::delete('replies/{reply}/favourites', 'FavouriteController@destroy');

Route::get('profiles/{user}', 'ProfileController@show')->name('profile');
Route::get('profiles/{user}/notifications', 'UserNotificationController@index');
Route::delete('profiles/{user}/notifications/{notification}', 'UserNotificationController@destroy');

Route::get('register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

Route::get('api/users', 'Api\UserController@index');
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');
