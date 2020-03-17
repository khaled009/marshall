<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable=['user_id','player_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function player(){
        return $this->belongsTo(User::class,'player_id');
    }
    public function messages(){
        return $this->hasMany(Message::class,'conversation_id');
    }
}
