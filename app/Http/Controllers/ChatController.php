<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Pusher\Pusher;
use App\Events\MessageSent;
use App\Events\FetchUsers;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Edit
    public function getChatPage()
    {
        $title = 'Chat';

        // User::join('messages', function ($leftJoin) {
        //     $leftJoin->on('users.id', '=', 'messages.from')
        //         ->orOn('users.id', '=', 'messages.to');
                
        // })

        $users = DB::table('users')
                ->join('messages', function ($join) {
                    $join->on('users.id', '=', 'messages.msg_to')->orOn('users.id', '=', 'messages.msg_from');
                })
                ->join('friends', function ($join) {
                    $join->on('users.id', '=', 'friends.friend_id')->orOn('users.id', '=', 'friends.user_id')
                    ->where('friends.accept', '=', 1 );
                })
                    ->select('messages.id', 'messages.msg_from','messages.is_read', 'messages.msg_to', 'messages.message',
                     'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
                    //  DB::raw('count(messages.is_read) as unread')
                     //->selectRaw('count(is_read) as unread')

                    ->where('friends.friend_id', '=', Auth::id())
                    ->orWhere('friends.user_id', '=', Auth::id())
                    // ->where('users.id', '!=', Auth::id())
                    // ->where('users.id', '=', Auth::id())
                    // ->where('messages.msg_from', Auth::id())
                    // ->orWhere('messages.msg_to', Auth::id())
                    ->groupBy('messages.id', 'messages.msg_from', 'messages.msg_to', 'messages.is_read', 'messages.message',
                    'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
                    ->orderBy('messages.created_at', 'desc')
                    ->get()
                    ->unique('id');

        // $users = DB::select("select users.id, users.name, users.avatar, users.email,messages.message, count(is_read) as unread 
        // from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        // where users.id != " . Auth::id() . " 
        // group by messages.created_at, users.id, users.name, users.avatar, users.email, messages.message");

        // $users = DB::select("SELECT * from users WHERE id != " . Auth::id() . " AND id IN 
        // ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " AND accept = 1 ) OR id IN 
        // ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " AND accept =1 ) 
        // ORDER BY name ASC" );
        
                    // event(new FetchUsers($users));
                return view('pages.chat')->with(compact('users', 'title'));
                // echo url()->previous(); die;
        
        
    }

    // public function getUsersList(Request $request)
    // {
    //     $users = Message::join('users',  function ($join) {
    //         $join->on('messages.from', '=', 'users.id')
    //             ->orOn('messages.to', '=', 'users.id');
    //     })
    //         ->select('messages.id', 'messages.from', 'messages.to', 'messages.message',
    //          'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar', DB::raw('count(is_read) as unread'))
    //          //->selectRaw('count(is_read) as unread')
             
             
    //         ->where('messages.from', Auth::id())
    //         ->orWhere('messages.to', Auth::id())
    //         ->groupBy('messages.id', 'messages.from', 'messages.to', 'messages.message',
    //         'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
    //         ->orderBy('messages.created_at', 'desc')
    //         ->get()
    //         ->unique('id');

    //         event(new FetchUsers($users));
    //     return view('messages.users', ['users' =>$users]);
        

    // }

    

    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['msg_from' => $user_id, 'msg_to' => $my_id])->update(['is_read' => 1]);

        // Getting all messages For selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('msg_from', $user_id)->where('msg_to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('msg_from', $my_id)->where('msg_to', $user_id);
        })->get();

        return view('messages.index', ['messages' => $messages]);

    }

    public function sendMessage(Request $request)
    {
       
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $datas = new Message();
        $datas->msg_from = $from;
        $datas->msg_to = $to;
        $datas->message = $message;
        $datas->is_read = 0; //Message will be unread by default
        // $datas->image = $profile_image_url;

        if($request->hasFile('image')){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . Auth::id() . "-chat." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'chat_images/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);

            $datas->image = $profile_image_url;
        }

      

        $datas->save();

        
        $datas = ['from' => $from, 'to' => $to];
        event(new MessageSent($datas));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
