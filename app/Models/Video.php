<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=['user_id','platform_id','video'];

    public function platform(){
        return $this->belongsTo(Platform::class,'platform_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
