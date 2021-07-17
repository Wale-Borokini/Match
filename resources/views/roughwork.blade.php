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
