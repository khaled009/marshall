<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRate extends Model
{
    protected $fillable=['user_id','rater_id','rate','comment'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function rater(){
        return $this->belongsTo(User::class,'rater_id');
    }
}
