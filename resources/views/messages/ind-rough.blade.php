<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                {{-- If message from id is equal to auth id, then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p>{{ $message->message }}</p>
                    <p class="date">{{ date('d M Y, h:i a', strtotime($message->created_at)) }}</p>
                </div>           
            </li>
        @endforeach

    </ul>
</div>
    <div class="row">
        <div class="col-md-9">
            <div class="input-text">
                <input type="text" name="message" id="textMessage" class="submit">
            </div>
        </div>
        <div class="col-md-3">
            <button class="btn btn-dark mt-4" id="sendMess">Send</button>
        </div>
    </div>
    


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