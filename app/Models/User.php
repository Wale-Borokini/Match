<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
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
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'avatar',
    // ];

    protected $guarded = [];

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

    protected static function boot(){
        parent::boot();

        static::created(function ($user) {
            $addCurntTime = time();
            $randSlug = Str::random(40);
            $user->update(['slug' => $randSlug."-".$addCurntTime]);
            // $post->update(['slug' => $post->title."-".$post->author]);
        });
    }
    
    public function setSlugAttribute($value){
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        $this->attributes['slug'] = $slug;
    }


    //Get User details for friends Table
    public static function getUserId($slug){
        $getUserId = User::select('id')->where('slug', $slug)->first();
        return $getUserId->id;
    }

    public static function getUserSlug($slug){
        $getUserSlug = User::select('slug')->where('slug', $slug)->first();
        return $getUserSlug->slug;
    }

    public static function sender_id($receiver_id){
        $sender_id = Friend::select('user_id')->where('friend_id', $receiver_id)->first();
        return $sender->id;
    }

    public static function sender_slug($receiver_slug){
        $sender_slug = Friend::select('user_slug')->where('friend_id', $receiver_id)->first();
        return $sender->slug;
    }

    public function posts() {
  
        return $this->hasMany(Post::class);
     
    }

    public function isAdmin() {
        
        return $this->admin;
    }

    public function isSuperAdmin() {
        
        return $this->super_admin;
    }

}
