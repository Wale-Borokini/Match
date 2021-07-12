<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Post;
use Auth;
use Purifier;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addThreadComment(Request $request, Post $post)
    {
        $this->validate($request,[
            'comment'=>'required'
        ]);

       $comment=new Comment();
       $comment->comment=Purifier::clean($request->comment);
       $comment->user_id=auth()->user()->id;

       $post->comments()->save($comment);

        // $post->addComment($request->comment);

        // $posts->user->notify(new RepliedToThread($posts));

        return back()->with('success', 'comment created');
    }

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'comment'=>'required'
        ]);

        // $comment->addComment($request->comment);
        $reply = new Comment();
        $reply->comment=Purifier::clean($request->comment);
        $reply->user_id = auth()->user()->id;

        $comment->comments()->save($reply);

        return redirect()->back()->with('success', 'Reply created');
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
