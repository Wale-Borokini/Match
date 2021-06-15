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
            echo "Friend request Sent to ". $name; die;
        }else{
            abort(404);
        }
    }

    public function getSuggestions()
    {
        
        $users = DB::select("SELECT id, avatar, name from users WHERE id != " . Auth::id() . " AND id NOT IN ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " ) AND id NOT IN ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " ) ");
        

        return view('pages.explore')->with(compact('users'));
        

    }

    public function getFriendRequests()
    {
    
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

        return view('pages.friendRequest')->with(compact('users'));
        

    }

    public function getFriendsList()
    {
    
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

        return view('pages.friends')->with(compact('users'));
        

    }


    public function acceptFriendRequest($sender_id)
    {
        
        $receiver_id = Auth::user()->id;
        // $sender_id = Friend::select('user_id')->where('friend_id', $receiver_id)->first();
        Friend::where(['user_id'=> $sender_id, 'friend_id'=>$receiver_id])->update(['accept'=>1]);
        // return redirect()->back()->with('Succexxful');

        echo "Friend request accepted "; die;
    }

    public function rejectFriendRequest($sender_id)
    {
        
        $receiver_id = Auth::user()->id;
        // $sender_id = Friend::select('user_id')->where('friend_id', $receiver_id)->first();
        Friend::where(['user_id'=> $sender_id, 'friend_id'=>$receiver_id])->delete();
        // return redirect()->back()->with('Succexxful');

        echo "Friend request rejected "; die;
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


}
