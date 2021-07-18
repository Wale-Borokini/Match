<?php

use Illuminate\Support\Facades\Route;
//use App\Events\MessageSent;
use App\Http\Controllers\ContactController;

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

// Unauthenticated Routes

Route::get('/', [
    'uses' => 'App\Http\Controllers\PagesController@viewIndexPage',    
])->name('index');

Route::get('/about', [
    'uses' => 'App\Http\Controllers\PagesController@viewAboutPage',    
])->name('about');

Route::get('/blog', [
    'uses' => 'App\Http\Controllers\PostsController@viewBlogPage',    
])->name('blog');

Route::get('/blogDetails/{post:slug}', [
    'uses' => 'App\Http\Controllers\PostsController@viewBlogDetailsPage',    
])->name('blogDetails');

Route::get('/codeOfConduct', [
    'uses' => 'App\Http\Controllers\PagesController@viewCodeOfConductPage',    
])->name('codeOfConduct');

Route::get('/contact', [
    'uses' => 'App\Http\Controllers\PagesController@viewContactPage',    
])->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact.save');

Route::get('/stayingSafe', [
    'uses' => 'App\Http\Controllers\PagesController@viewStayingSafePage',    
])->name('stayingSafe');

// Route::get('/login', [
//     'uses' => 'App\Http\Controllers\PagesController@viewLoginPage',
//     'as' => 'login'
// ]);


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


// Authenticated Routes For Users

Route::group([ 'middleware' => ['auth']], function() {

    Route::get('/explore', [
        'uses' => 'App\Http\Controllers\FriendsController@getSuggestions',    
    ])->name('explore');
    
    Route::get('/friendRequest', [
        'uses' => 'App\Http\Controllers\FriendsController@getFriendRequests',    
    ])->name('friendRequest');

    Route::get('/friends', [
        'uses' => 'App\Http\Controllers\FriendsController@getFriendsList',    
    ])->name('friends');

    Route::get('/friendsProfile/{slug}', [
        'uses' => 'App\Http\Controllers\FriendsController@viewFriendProfile',    
    ])->name('friendsProfile');

    Route::get('/viewProfile', [
        'uses' => 'App\Http\Controllers\PagesController@viewProfile',    
    ])->name('profile');

    Route::post('/viewProfile', [
        'uses' => 'App\Http\Controllers\PagesController@changeProfile',    
    ])->name('profile.change');

    Route::get('/editProfile', [
        'uses' => 'App\Http\Controllers\PagesController@editProfile',    
    ])->name('editProfile');

    Route::post('editProfile','App\Http\Controllers\PagesController@update')->name('profile.update');

    Route::get('/acceptFriendRequest/{slug}', [
        'uses' => 'App\Http\Controllers\FriendsController@acceptFriendRequest',    
    ])->name('acceptFriendRequest');

    Route::get('/rejectFriendRequest/{slug}', [
        'uses' => 'App\Http\Controllers\FriendsController@rejectFriendRequest',    
    ])->name('rejectFriendRequest');

    Route::match(['get', 'post'], '/add-friend/{slug}', [
        'uses' => 'App\Http\Controllers\FriendsController@addFriend',
    ])->name('addFriend');
    
    Route::post('comment/create/{post}','App\Http\Controllers\CommentsController@addThreadComment')->name('threadcomment.store');

    Route::post('reply/create/{comment}','App\Http\Controllers\CommentsController@addReplyComment')->name('replycomment.store');

    Route::get('/chat', [
        'uses' => 'App\Http\Controllers\ChatController@getChatpage',    
    ])->name('chat');
    
    Route::post('chat', [
        'uses' => 'App\Http\Controllers\ChatController@sendMessage'
    ])->name('msg.chat');

    Route::get('/message/{id}', [
        'uses' => 'App\Http\Controllers\ChatController@getMessage',    
    ])->name('message');

    Route::get('/displaySugUser/{slug}', [
        'uses' => 'App\Http\Controllers\FriendsController@displaySugUser',    
    ]);

});


// Route::post('blogDetails', [
//     'uses' => 'App\Http\Controllers\CommentsController@store'
// ]);


Auth::routes();




// Route::get('/userslist', [
//     'uses' => 'App\Http\Controllers\ChatController@getUsersList',
//     //'as' => 'userslist'
// ]);



// Route::post('message', [
//     'uses' => 'App\Http\Controllers\ChatController@sendMessage'
// ])->name('msg.send');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google Login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook Login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


// Admin Routes

Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function() {


    Route::get('adminDashboard', [
        'uses' => 'App\Http\Controllers\AdminController@adminDashboard'
    ])->name('adminDashboard');

    Route::get('/viewUserProfile/{slug}', [
        'uses' => 'App\Http\Controllers\AdminController@viewUserProfile',        
    ])->name('viewUserProfile');

    Route::get('/viewUsers', [
        'uses' => 'App\Http\Controllers\AdminController@viewUsers',        
    ])->name('viewUsers');

    Route::get('createBlogPost', [
        'uses' => 'App\Http\Controllers\PostsController@getCreatePostPage'
    ])->name('createBlogPost');
    
    Route::get('blogAdminView', [
        'uses' => 'App\Http\Controllers\PostsController@blogAdminView'
    ])->name('blogAdminView');
    
    Route::post('createBlogPost', [
        'uses' => 'App\Http\Controllers\PostsController@createPost'
    ])->name('create.blogPost');
    
    Route::get('editPost/{post:slug}', [
        'uses' => 'App\Http\Controllers\PostsController@edit'
    ])->name('editBlogPost');
    
    Route::post('editPost/{post:slug}','App\Http\Controllers\PostsController@update')->name('post.update');
    
    Route::delete('blogAdminView/{post:slug}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('post.delete');
    

});

// Super Admin Route

Route::group(['prefix' =>'superadmin', 'middleware' => ['auth', 'superadmin']], function() {

    Route::get('roles', [
        'uses' => 'App\Http\Controllers\AdminController@adminRoles'
    ])->name('adminRole');

    Route::get('giveAdminRole/{slug}', [
        'uses' => 'App\Http\Controllers\AdminController@giveAdminRole',        
    ])->name('giveAdminRole');

    Route::get('removeAdminRole/{slug}', [
        'uses' => 'App\Http\Controllers\AdminController@removeAdminRole',        
    ])->name('removeAdminRole');

});