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


Route::get('/', [
    'uses' => 'App\Http\Controllers\PagesController@viewIndexPage',
    'as' => 'index'
]);

Route::get('/about', [
    'uses' => 'App\Http\Controllers\PagesController@viewAboutPage',
    'as' => 'about'
]);

Route::get('/blog', [
    'uses' => 'App\Http\Controllers\PostsController@viewBlogPage',
    'as' => 'blog'
]);



Route::get('/codeOfConduct', [
    'uses' => 'App\Http\Controllers\PagesController@viewCodeOfConductPage',
    'as' => 'codeOfConduct'
]);

Route::get('/contact', [
    'uses' => 'App\Http\Controllers\PagesController@viewContactPage',
    'as' => 'contact'
]);

Route::get('/stayingSafe', [
    'uses' => 'App\Http\Controllers\PagesController@viewStayingSafePage',
    'as' => 'stayingSafe'
]);

Route::get('/login', [
    'uses' => 'App\Http\Controllers\PagesController@viewLoginPage',
    'as' => 'login'
]);


// Route::get('/createAccount', function () {
//     return view('pages.createAccount');
// });

// Route::get('/createAccount', [
//     'uses' => 'App\Http\Controllers\PagesController@viewCreateAccountPage',
//     'as' => 'createAccount'
// ]);

Route::get('/401', function () {
    return view('errors.401');
});

Route::get('/friendRequest', [
    'uses' => 'App\Http\Controllers\FriendsController@getFriendRequests',
    'as' => 'friendRequest'
]);

Route::get('/friends', [
    'uses' => 'App\Http\Controllers\FriendsController@getFriendsList',
    'as' => 'friends'
]);

Route::get('/friendsProfile/{slug}', [
    'uses' => 'App\Http\Controllers\FriendsController@viewFriendProfile',
    'as' => 'friendsProfile'
]);

Route::get('/viewProfile', [
    'uses' => 'App\Http\Controllers\PagesController@viewProfile',
    'as' => 'profile'
]);

Route::get('/editProfile', [
    'uses' => 'App\Http\Controllers\PagesController@editProfile',
    'as' => 'editProfile'
]);

Route::post('editProfile','App\Http\Controllers\PagesController@update')->name('profile.update');

Route::get('/acceptFriendRequest/{slug}', [
    'uses' => 'App\Http\Controllers\FriendsController@acceptFriendRequest',
    'as' => 'acceptFriendRequest'
]);

Route::get('/rejectFriendRequest/{slug}', [
    'uses' => 'App\Http\Controllers\FriendsController@rejectFriendRequest',
    'as' => 'rejectFriendRequest'
]);



Route::match(['get', 'post'], '/add-friend/{slug}', 'App\Http\Controllers\FriendsController@addFriend');


Route::get('/explore', [
    'uses' => 'App\Http\Controllers\FriendsController@getSuggestions',
    'as' => 'explore'
]);


// Route::post('/comment/store', 'App\Http\Controllers\CommentsController@store')->name('comment.store');
// Route::post('/reply/store', 'App\Http\Controllers\CommentsController@replyStore')->name('reply.add');

Route::post('comment/create/{post}','App\Http\Controllers\CommentsController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}','App\Http\Controllers\CommentsController@addReplyComment')->name('replycomment.store');

Route::get('/blogDetails/{post:slug}', [
    'uses' => 'App\Http\Controllers\PostsController@viewBlogDetailsPage',
    'as' => 'blogDetails'
]);


// Route::post('/comment/store', 'App\Http\Controllers\CommentsController@store')->name('comment.add');
// Route::post('/reply/store', 'App\Http\Controllers\CommentsController@replyStore')->name('reply.add');

// Route::post('blogDetails', [
//     'uses' => 'App\Http\Controllers\CommentsController@store'
// ]);


Auth::routes();


Route::get('/chat', [
    'uses' => 'App\Http\Controllers\ChatController@getChatpage',
    'as' => 'chat'
]);

// Route::get('/userslist', [
//     'uses' => 'App\Http\Controllers\ChatController@getUsersList',
//     //'as' => 'userslist'
// ]);

Route::get('/message/{id}', [
    'uses' => 'App\Http\Controllers\ChatController@getMessage',
    'as' => 'message'
]);

Route::get('/displaySugUser/{id}', [
    'uses' => 'App\Http\Controllers\FriendsController@displaySugUser',
    'as' => 'displaySugUser'
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

Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function() {

    Route::get('createBlogPost', [
        'uses' => 'App\Http\Controllers\postsController@getCreatePostPage'
    ]);
    
    Route::get('blogAdminView', [
        'uses' => 'App\Http\Controllers\postsController@blogAdminView'
    ]);
    
    Route::post('createBlogPost', [
        'uses' => 'App\Http\Controllers\postsController@createPost'
    ]);
    
    Route::get('editPost/{post:slug}', [
        'uses' => 'App\Http\Controllers\postsController@edit'
    ]);
    
    Route::post('editPost/{post:slug}','App\Http\Controllers\PostsController@update')->name('post.update');
    
    Route::delete('blogAdminView/{post:slug}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('post.delete');
    

});