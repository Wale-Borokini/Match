public function getSuggestions(Request $request, $name)
    {
        $users = User::all();


        if(Auth::check()){
            // Check if the user is friend or not
            $friendrequest = 'true';
            $user_id = Auth::user()->id;
            $friend_id = User::getUserId($name);
            $friendCount = Friend::where(['user_id'=>$user_id, 'friend_id'=>$friend_id])->first();
            $friendDetails = json_decode(json_encode($friendDetails));
            echo "<pre>"; print_r($friendDetails); die;
        }else{
            $friendrequest = "";
        }

        return view('pages.explore')->with(compact('users', 'friendrequest'));
        

    }




    // $friendss = Friend::all('friend_id');
        
        // $users = User::all();
        // $users = DB::table('users')
        //             ->where('id', '!=', Auth::id())
        //             ->where('id', '!=', 3)
        //             ->get();

        // $users = Friend::join('users',  function ($join) {
        //     $join->on('friends.user_id', '=', 'users.id');
                
        // })
        //     ->select('users.id', 'users.name', 'users.avatar')
        //     ->where('friends.friend_id', '!=',Auth::id())
        //     ->where('friends.user_id', '!=',Auth::id())
        //     // ->where('friends.accept', 0)
        //     ->get();

        // $friendss = Friend::pluck('friend_id')->all();
        // $friendSender = Friend::pluck('user_id')->all();
        // $users = User::whereNotIn('id', $friendss)->whereIn('id', $friendSender) ->where('id', '!=', Auth::id())
        // ->select('name', 'avatar')->get();



        // $friendCount = Friend::join('users',  function ($join) {
            //     $join->on('friends.user_id', '=', 'users.id');
                    
            // })
                // ->select('users.id', 'users.name', 'users.avatar', 'users.slug')
                // ->where(['friends.friend_id'=> $user_id, 'friends.accept'=> 1])
                // ->count();
    
                // $friendOfCount = Friend::join('users',  function ($join) {
                //     $join->on('friends.friend_id', '=', 'users.id');
                        
                // })
                //     ->select('users.id', 'users.name', 'users.avatar', 'users.slug')
                //     ->where(['friends.user_id'=> $user_id, 'friends.accept'=> 1])
                //     ->count();
                
    
                // if($friendCount > 0){
                //     $users = Friend::join('users',  function ($join) {
                //         $join->on('friends.user_id', '=', 'users.id');
                            
                //     })
                //         ->select('users.id', 'users.name', 'users.avatar', 'users.slug')
                //         ->where(['friends.friend_id'=> $user_id, 'friends.accept'=> 1])
                //         ->orderBy('friends.created_at', 'desc')
                //         ->get();
                // }else{
                //     $users = Friend::join('users',  function ($join) {
                //         $join->on('friends.friend_id', '=', 'users.id');
                            
                //     })
                //         ->select('users.id', 'users.name', 'users.avatar', 'users.slug')
                //         ->where(['friends.user_id'=> $user_id, 'friends.accept'=> 1])
                //         ->orderBy('friends.created_at', 'desc')
                //         ->get();
                // }
                


MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"




$users = DB::table('users')
                ->join('messages', function ($join) {
                    $join->on('users.id', '=', 'messages.msg_to')->orOn('users.id', '=', 'messages.msg_from');
                })
                ->join('friends', function ($join) {
                    $join->on('users.id', '=', 'friends.friend_id')->orOn('users.id', '=', 'friends.user_id');
                })
                ->select('messages.id', 'messages.msg_from','messages.is_read', 'messages.msg_to', 'messages.message',
                    'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
                    //  DB::raw('count(messages.is_read) as unread')
                     //->selectRaw('count(is_read) as unread')

                    // ->where([['friends.friend_id', '=', Auth::id()], ['friends.accept', '=', 1]])
                    // ->orWhere([['friends.user_id', '=', Auth::id()], ['friends.accept', '=', 1]])
                    // // ->where('users.id', '!=', Auth::id())
                    // ->where('users.id', '=', Auth::id())
                    ->where('messages.msg_from', Auth::id())
                    ->orWhere('messages.msg_to', Auth::id())
                    ->groupBy('messages.id', 'messages.msg_from', 'messages.msg_to', 'messages.is_read', 'messages.message',
                    'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
                    ->orderBy('messages.created_at', 'desc')
                    ->get()
                    ->unique('id');


                    $recvId = User::getUserIdMs($id);
        $user_id = Auth::user()->id;



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
                // ->join('friends', function ($join) {
                //     $join->on('users.id', '=', 'friends.friend_id')->orOn('users.id', '=', 'friends.user_id');
                    
                // })
                    ->select('messages.id', 'messages.msg_from','messages.is_read', 'messages.msg_to', 'messages.message',
                     'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
                    //  DB::raw('count(messages.is_read) as unread')
                     //->selectRaw('count(is_read) as unread')

                    // ->where([['friends.friend_id', '=', Auth::id()], ['friends.accept', '=', 1]])
                    // ->orWhere([['friends.user_id', '=', Auth::id()], ['friends.accept', '=', 1]])
                    // ->where('users.id', '!=', Auth::id())
                    // ->where('users.id', '=', Auth::id())
                    ->where('messages.msg_from', Auth::id())
                    ->orWhere('messages.msg_to', Auth::id())
                    ->groupBy('messages.id', 'messages.msg_from', 'messages.msg_to', 'messages.is_read', 'messages.message',
                    'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
                    ->orderBy('messages.created_at', 'desc')
                    ->get()
                    ->unique('id');


        // $users = DB::select("SELECT * from users WHERE id != " . Auth::id() . " AND id IN 
        // ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " AND accept = 1 ) OR id IN 
        // ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " AND accept =1 ) ORDER BY name ASC" );

            
            // $friendList = Friend::where([['user_id', '=', Auth::id()], ['accept', '=', 1]])->pluck('friend_id')->all();

            $friendList = Friend::pluck('friend_id')->all();   
            
            // $users = Auth::user()->friends()->get();

        //    $users = User::join('messages', function ($join) {
        //     $join->on('users.id', '=', 'messages.msg_from')
        //         ->orOn('users.id', '=', 'messages.msg_to');
                
        //     })

                
        //         ->whereIn('users.id', $friendList)
        //         ->select('messages.id', 'messages.msg_from','messages.is_read', 'messages.msg_to', 'messages.message',
        //         'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
        //         // ->where('messages.msg_from', Auth::id())
        //         // ->orWhere('messages.msg_to', Auth::id())

        //         ->groupBy('messages.id', 'messages.msg_from', 'messages.msg_to', 'messages.is_read', 'messages.message',
        //         'messages.created_at', 'users.id', 'users.name', 'users.email', 'users.avatar')
        //         ->orderBy('messages.created_at', 'desc')
        //         ->get()
        //         ->unique('id');

        // $users = DB::select("select users.id, users.name, users.avatar, users.email, messages.message, messages.is_read, 
        // messages.msg_to, messages.msg_from, messages.created_at, max(messages.created_at) as max_created_at
        // from users LEFT  JOIN  messages ON users.id = messages.msg_from and is_read = 0 and messages.msg_to = " . Auth::id() . "
        // where users.id != " . Auth::id() . " AND users.id IN 
        // ( SELECT friends.friend_id from friends WHERE friends.user_id = " . Auth::id() . " AND friends.accept = 1 ) OR users.id IN 
        // ( SELECT friends.user_id from friends WHERE friends.friend_id = " . Auth::id() . " AND friends.accept =1 )
        // group by messages.created_at, users.id, users.name, users.avatar, users.email, messages.message, messages.is_read, 
        // messages.msg_to, messages.msg_from ORDER BY max_created_at DESC");



        // $users = DB::select("SELECT * from users WHERE id != " . Auth::id() . " AND id IN 
        // ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " AND accept = 1 ) OR id IN 
        // ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " AND accept =1 ) 
        // ORDER BY name ASC" );
        
                    // event(new FetchUsers($users));
                //    echo var_dump($friendList); die;
                return view('pages.chat')->with(compact('users', 'title'));
                // echo url()->previous(); die;
        
        
    }