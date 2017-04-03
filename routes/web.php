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

Route::get('/add_friend', function () {
    $friend = App\User::first();
    return $friend->add_friend(9);
});
Route::get('/accept_friend', function () {
    $friend = App\User::first();
    return $friend->accept_friend(2);
});
Route::get('/friends', function () {
    $user = App\User::find(1);
    return $user->friends();
});
Route::get('/friends_id', function () {
    $user = App\User::find(1);
    return $user->friends_id();
});
Route::get('/is_friends_with', function () {
    $user = App\User::find(1);
    return $user->is_friends_with(4);
});
Route::get('/pending_request', function () {
    $user = App\User::find(1);
    return $user->pending_friend_requests();
});


Route::get('/pending_request_id', function () {
    $user = App\User::find(1);
    return $user->pending_friend_requests_id();
});

Route::get('/pending_request_sent', function () {
    $user = App\User::find(1);
    return $user->pending_friend_requests_sent();
});
Route::get('/pending_friend_requests_sent_id', function () {
    $user = App\User::find(1);
    return $user->pending_friend_requests_sent_id();
});

Route::get('/has_pending_friend_requests_sent_to', function () {
    $user = App\User::find(1);
    return $user->has_pending_friend_requests_sent_to(5);
});


Route::get('/hello', function () {
    return Auth::user()->hello();
});

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
