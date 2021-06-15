<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['from', 'to', 'message', 'is_read',];

    // public function messages()
    // {
    //     return $this->belongsToMany('Message');
    // }

    // public function sent_messages()
    // {
    //     return $this->hasMany('Messages', 'from');
    // }
}

