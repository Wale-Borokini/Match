<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
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
        // Select all users execpt logged in user
       // $users = User::where('id', '!=', Auth::id())->get();

        // Count how many messages are unread from the selected user
        // $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread 
        // from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        // where users.id != " . Auth::id() . " 
        // group by users.id, users.name, users.avatar, users.email
        // ORDER BY messages.created_at desc
        // ");

        // get all users that received/sent message from/to [Auth user]
        // $users = Message::join('users',  function ($join) {
        //     $join->on('messages.from', '=', 'users.id')
        //         ->orOn('messages.to', '=', 'users.id');
        // })
        //     ->select('messages.id', 'messages.from', 'messages.to', 'messages.message',
        //      'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
        //     ->where('messages.from', Auth::id())
        //     ->orWhere('messages.to', Auth::id())
        //     ->orderBy('messages.created_at', 'desc')
        //     ->get()
        //     ->unique('id');

        
        return view('chat');
        // event(new FetchUsers($users));

    }

    public function getUsersList(Request $request)
    {
        $users = Message::join('users',  function ($join) {
            $join->on('messages.from', '=', 'users.id')
                ->orOn('messages.to', '=', 'users.id');
        })
            ->select('messages.id', 'messages.from', 'messages.to', 'messages.message',
             'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar', DB::raw('count(is_read) as unread'))
             //->selectRaw('count(is_read) as unread')
             
             
            ->where('messages.from', Auth::id())
            ->orWhere('messages.to', Auth::id())
            ->groupBy('messages.id', 'messages.from', 'messages.to', 'messages.message',
            'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
            ->orderBy('messages.created_at', 'desc')
            ->get()
            ->unique('id');

            event(new FetchUsers($users));
        return view('messages.users', ['users' =>$users]);
        

    }

    

    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Getting all messages For selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('messages.index', ['messages' => $messages]);

    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $datas = new Message();
        $datas->from = $from;
        $datas->to = $to;
        $datas->message = $message;
        $datas->is_read = 0; //Message will be unread by default
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
