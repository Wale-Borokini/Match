<?php
/**
 * Created by PhpStorm.
 * User: webdev
 * Date: 4/23/2017
 * Time: 7:35 AM
 */

// namespace App\Models;


// trait CommentableTrait
// {

//     public function comments()
//     {
//         return $this->morphMany(Comment::class,'commentable')->latest();
//     }


//     public function addComment($comment)
//     {
//         $comment=new Comment();
//         $comment->comment=$comment;
//         $comment->user_id=auth()->user()->id;

//         $this->comments()->save($comment);

//         return $comment;
//     }

//}