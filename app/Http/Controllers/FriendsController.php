<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Friend;
use App\Models\Image;
use Auth;
use DB;



class FriendsController extends Controller
{
    //
    
    public function addFriend($slug){
        $userCount = User::where('slug', $slug)->count();
        if($userCount>0){
            $user_id = Auth::user()->id;
            $user_slug = Auth::user()->slug;
            $friend_id = User::getUserId($slug);
            $friend_slug = User::getUserSlug($slug);
            $friend = new Friend;
            $friend->user_id = $user_id;
            $friend->friend_id = $friend_id;
            $friend->user_slug = $user_slug;
            $friend->friend_slug = $friend_slug;
            
            $friend->accept = 0;
            $friend->save();

            // Check if a user has already sent a friend request to me to avoid a duplicate request
            
                if(Friend::where('user_id', '=', $friend_id )->where('friend_id', '=', $user_id)->exists()){
                    return redirect()->back()->with('error', 'This user sent a request to You recently');
                }
            
            return redirect()->back()->with('success', 'Friend Request Sent');

        }else{
            abort(404);
        }

        
    }

    

    public function getSuggestions()
    {
        // Page Title
        $title = 'Explore';

        // Define User Visibility
        $publiclyVis = 'Public';
        $privatelyVis = 'Private';
        $lgnUser = Auth::user();
        $users = DB::select("SELECT id, avatar, visibility, alias, name, slug, state, country, banned from users WHERE id != " . Auth::id() . " AND id NOT IN ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " ) AND id NOT IN ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " ) ");
        
        return view('pages.explore')->with(compact('users', 'lgnUser', 'title', 'publiclyVis', 'privatelyVis'));
        

    }
    

    public function displaySugUser($slug)
    {
        

        // Define User Visibility
        $publiclyVis = 'Public';
        $privatelyVis = 'Private';
        
        $sugUsers = User::where('slug', $slug)->get();
                
        return view('pages.displaySugUser')->with(compact('sugUsers', 'publiclyVis', 'privatelyVis'));
        

    }

    public function getFriendRequests()
    {
        $title = 'Friend Requests';
        
        $users = Friend::join('users',  function ($join) {
            $join->on('friends.user_id', '=', 'users.id');
                
        })
            ->select('users.id', 'users.name', 'users.avatar', 'users.slug', 'users.alias', 'users.bio')
            ->where(['friends.friend_id'=>Auth::id(), 'friends.accept'=> 0])            
            ->get();
        
            $countRequest = count($users);
            
        return view('pages.friendRequest')->with(compact('users', 'title'));
        

    }

    public function getFriendsList()
    {
        $title = 'Friends';
        
        $users = DB::select("SELECT name, avatar, bio, slug, alias  from users WHERE id != " . Auth::id() . " AND id IN ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " AND accept = 1 ) OR id IN ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " AND accept =1 ) ORDER BY name ASC" );
        $friendCount = count($users);

        return view('pages.friends')->with(compact('users', 'title', 'friendCount'));
        

    }


    public function acceptFriendRequest($sender_slug)
    {
        
        $receiver_id = Auth::user()->id;        
        Friend::where(['user_slug'=> $sender_slug, 'friend_id'=>$receiver_id])->update(['accept'=>1]);

        return redirect()->back()->with('success', 'Friend Request Accepted');
        
    }


    public function rejectFriendRequest($sender_slug)
    {
        
        $receiver_id = Auth::user()->id;        
        Friend::where(['user_slug'=> $sender_slug, 'friend_id'=>$receiver_id])->delete();        

        return redirect()->back()->with('error', 'Friend Request Rejected');
    }


    public function deleteFriend(Friend $friend, $slug)
    {
        $userId = Auth::user()->id;
        $friendCount = Friend::where(['user_slug'=>$slug, 'friend_id'=>$userId, 'accept'=> 1])->count();
        $friendOfCount = Friend::where(['user_id'=>$userId, 'friend_slug'=>$slug, 'accept'=> 1])->count();
        
        if($friendCount>0){
            
            Friend::where(['user_slug'=>$slug, 'friend_id'=>$userId, 'accept'=> 1])->delete();
            
        }elseif($friendOfCount >0){
            
            $friendOfCount = Friend::where(['user_id'=>$userId, 'friend_slug'=>$slug, 'accept'=> 1])->delete();
            
        }

        return redirect()->route('friends')->with('error', 'Friend Deleted');

    }


    public function viewProfile($name)
    {
        $userCount = User::where('name', $name)->count();
        if($userCount>0){
            $users = User::all();

            if(Auth::check()){
                // Check if the user is friend or not
                $user_id = Auth::user()->id;
                $friend_id = User::getUserId($name);
                $friendCount = Friend::where(['user_id'=>$user_id, 'friend_id'=>$friend_id])->count();
                if($friendCount>0){

                }
            }else{
                $friendrequest = "";
            }

        }else{
            abort(404);
        }

    }

    public function viewFriendProfile($slug)
    {
        $title = 'Profile';
                        

            // Check if the user is friend or not
            $user_id = Auth::id();
            $friendCount = Friend::where(['user_slug'=>$slug, 'friend_id'=>$user_id, 'accept'=> 1])->count();
            $friendOfCount = Friend::where(['user_id'=>$user_id, 'friend_slug'=>$slug, 'accept'=> 1])->count();

            if($friendCount>0){ 

                $user = User::where('slug', $slug)->firstOrFail();
                
            }elseif($friendOfCount >0){

                $user = User::where('slug', $slug)->firstOrFail();
                
            }else{
                return redirect('/401');
            }                        

        return view('pages.friendsProfile')->with(compact('user', 'title'));
    }
    

}
