<?php

namespace App\Models;

use App\Admin;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=['user_id','conversation_id','message','type'];
    protected $appends=['SenderName','SenderImage'];
    public function sender(){
        if ($this->attributes['type']=='users') {
            return $this->belongsTo(User::class, 'user_id');
        }else{
            return  $this->belongsTo(Admin::class,'user_id');
        }
    }

    public function getSenderNameAttribute()
    {
        return $this->sender->name;
    }
    public function getSenderImageAttribute()
    {
        return asset($this->sender->image);
    }
}
