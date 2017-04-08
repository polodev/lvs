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

Route::get('/check_relationship_status/{id}', [
    'uses' => 'FriendshipsController@check', 
    'as' => 'check'
]);
Route::get('/add_friend/{id}', [
    'uses' => 'FriendshipsController@add_friend', 
    'as' => 'add_friend'
]);
Route::get('/accept_friend/{id}', [
    'uses' => 'FriendshipsController@accept_friend', 
    'as' => 'accept_friend'
]);
Route::get('/get_unread_notifications', function () {
    return auth()->user()->unreadNotifications;
});

Route::get('/notifications', [
    'uses' => 'HomeController@notifications',
    'as' => 'notifications'
]);

Route::post('/post/create', [
    'uses' => 'PostsController@store',
    'as' => 'post'
]);
Route::get('/feed', [
    'uses' => 'FeedsController@index',
    'as' => 'feed'
]);
Route::get('/get_auth_user_data', function () {
    return Auth::user();
});
Route::get('/like/{post_id}', [
    'uses' => 'LikesController@like',
    'as' => 'like'
]);
Route::get('/unlike/{post_id}', [
    'uses' => 'LikesController@unlike',
    'as' => 'unlike'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);
    Route::get('profile/edit/profile', [
        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);
    Route::post('profile/update/profile', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);
});
