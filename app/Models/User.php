<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use App\Models\User;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        
        return $this->admin;
    }

    public static function getUserId($name){
        $getUserId = User::select('id')->where('name', $name)->first();
        return $getUserId->id;
    }

    public static function sender_id($receiver_id){
        $sender_id = Friend::select('user_id')->where('friend_id', $receiver_id)->first();
        return $sender->id;
    }

    public function posts() {
  
        return $this->hasMany(Post::class);
     
    }

}
