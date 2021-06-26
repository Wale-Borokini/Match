<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    

    // public function posts()
    // {
    //     return $this->belongsTo('App\Models\Post', 'post_id');
    // }

    // public function replies()
    // {
    //     return $this->hasMany('App\Models\Comment', 'parent_id');
    // }
    // protected $guarded = [];
    
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    
    
    // public function replies()
    // {
    //     return $this->hasMany(Comment::class, 'parent_id');
    // }

    // use CommentableTrait;

    protected $fillable=['comment','user_id'];
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->latest();
    }

}
