<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Friend;
use Auth;
use DB;



class FriendsController extends Controller
{
    //

    public function addFriend($name){
        $userCount = User::where('name', $name)->count();
        if($userCount>0){
            $user_id = Auth::user()->id;
            $friend_id = User::getUserId($name);
            $friend = new Friend;
            $friend->user_id = $user_id;
            $friend->friend_id = $friend_id;
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
        $title = 'Explore';

        $users = DB::select("SELECT id, avatar, name from users WHERE id != " . Auth::id() . " AND id NOT IN ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " ) AND id NOT IN ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " ) ");
        
        return view('pages.explore')->with(compact('users', 'title'));
        

    }

    public function getFriendRequests()
    {
        $title = 'Friend Requests';
        // $friendRecv = Friend::pluck('friend_id')->all();
        // // $friendSender = Friend::pluck('user_id')->all();
        // $users = User::whereIn('id', $friendRecv)y
        // ->select('name', 'avatar')->get();
        // $friends = Friend::all();
        // $friends = Friend::where('friend_id', '=', Auth::id())->get();

        $users = Friend::join('users',  function ($join) {
            $join->on('friends.user_id', '=', 'users.id');
                
        })
            ->select('users.id', 'users.name', 'users.avatar')
            ->where(['friends.friend_id'=>Auth::id(), 'friends.accept'=> 0])
            // ->where('friends.accept', 0)
            ->get();

        return view('pages.friendRequest')->with(compact('users', 'title'));
        

    }

    public function getFriendsList()
    {
        $title = 'Friends';

        $friendCount = Friend::join('users',  function ($join) {
            $join->on('friends.user_id', '=', 'users.id');
                
        })
            ->select('users.id', 'users.name', 'users.avatar')
            ->where(['friends.friend_id'=>Auth::id(), 'friends.accept'=> 1])
            ->count();

            if($friendCount > 0){
                $users = Friend::join('users',  function ($join) {
                    $join->on('friends.user_id', '=', 'users.id');
                        
                })
                    ->select('users.id', 'users.name', 'users.avatar')
                    ->where(['friends.friend_id'=>Auth::id(), 'friends.accept'=> 1])
                    ->get();
            }else{
                $users = Friend::join('users',  function ($join) {
                    $join->on('friends.friend_id', '=', 'users.id');
                        
                })
                    ->select('users.id', 'users.name', 'users.avatar')
                    ->where(['friends.user_id'=>Auth::id(), 'friends.accept'=> 1])
                    ->get();
            }

        return view('pages.friends')->with(compact('users', 'title'));
        

    }


    public function acceptFriendRequest($sender_id)
    {
        
        $receiver_id = Auth::user()->id;
        // $sender_id = Friend::select('user_id')->where('friend_id', $receiver_id)->first();
        Friend::where(['user_id'=> $sender_id, 'friend_id'=>$receiver_id])->update(['accept'=>1]);
        // return redirect()->back()->with('Succexxful');
        return redirect()->back()->with('success', 'Friend Request Accepted');
        
    }

    public function rejectFriendRequest($sender_id)
    {
        
        $receiver_id = Auth::user()->id;
        // $sender_id = Friend::select('user_id')->where('friend_id', $receiver_id)->first();
        Friend::where(['user_id'=> $sender_id, 'friend_id'=>$receiver_id])->delete();
        // return redirect()->back()->with('Succexxful');

        return redirect()->back()->with('error', 'Friend Request Rejected');
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

    public function viewFriendProfile($id)
    {
        $title = 'Profile';

            // Check if the user is friend or not
            $user_id = Auth::id();
            $friendCount = Friend::where(['user_id'=>$id, 'friend_id'=>$user_id, 'accept'=> 1])->count();
            $friendOfCount = Friend::where(['user_id'=>$user_id, 'friend_id'=>$id, 'accept'=> 1])->count();
            if($friendCount>0){
                $user = User::find($id);
                
            }elseif($friendOfCount >0){
                $user = User::find($id);
                
            }else{
                return redirect('/401');
            }
            
        
        

        return view('pages.friendsProfile')->with(compact('user', 'title'));
    }


}
