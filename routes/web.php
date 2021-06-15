<?php

use Illuminate\Support\Facades\Route;
//use App\Events\MessageSent;

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
    return view('pages.index');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/blogDetails', function () {
    return view('pages.blogDetails');
});

Route::get('/codeOfConduct', function () {
    return view('pages.codeOfConduct');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/createAccount', function () {
    return view('pages.createAccount');
});

// Route::get('/friendRequest', function () {
//     return view('pages.friendRequest');
// });

Route::get('/friendRequest', [
    'uses' => 'App\Http\Controllers\FriendsController@getFriendRequests',
    'as' => 'friendRequest'
]);

Route::get('/friends', [
    'uses' => 'App\Http\Controllers\FriendsController@getFriendsList',
    'as' => 'friends'
]);

Route::get('/acceptFriendRequest/{id}', [
    'uses' => 'App\Http\Controllers\FriendsController@acceptFriendRequest',
    'as' => 'acceptFriendRequest'
]);

Route::get('/rejectFriendRequest/{id}', [
    'uses' => 'App\Http\Controllers\FriendsController@rejectFriendRequest',
    'as' => 'rejectFriendRequest'
]);



Route::match(['get', 'post'], '/add-friend/{name}', 'App\Http\Controllers\FriendsController@addFriend');

// Route::get('/explore', function () {
//     return view('pages.explore');
// });

Route::get('/explore', [
    'uses' => 'App\Http\Controllers\FriendsController@getSuggestions',
    'as' => 'explore'
]);

Route::get('/stayingSafe', function () {
    return view('pages.stayingSafe');
});



Auth::routes();


Route::get('/chat', [
    'uses' => 'App\Http\Controllers\ChatController@getChatpage',
    'as' => 'chat'
]);

Route::get('/userslist', [
    'uses' => 'App\Http\Controllers\ChatController@getUsersList',
    //'as' => 'userslist'
]);

Route::get('/message/{id}', [
    'uses' => 'App\Http\Controllers\ChatController@getMessage',
    'as' => 'message'
]);

Route::post('message', [
    'uses' => 'App\Http\Controllers\ChatController@sendMessage'
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google Login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook Login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


// Admin Routes

Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']],
function() {

});