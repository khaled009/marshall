<?php

namespace App;


use App\Models\Conversation;
use App\Models\UserFavorite;
use App\Models\UserRate;
use App\Models\Video;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //unavailable
    protected $fillable = [
        'type','mobile','name','email','gender','image', 'password','reset_code','age','height',
        'weight','position','latitude','longitude','foot','code','identify_image','club_image','trainee_image'
    ];
    protected $appends=['GenderName'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];


    public function scopefindByType($query, $type)
    {
        return $query->where('type', $type)->get();
    }


    public function getGenderNameAttribute(){
        switch ($this->gender) {
            case 'male':
                if (app()->getLocale()=='en'){
                    return 'Male';
                }
                return 'ذكر';
        break;
            case 'female':
                if (app()->getLocale()=='en'){
                    return 'Female';
                }
                return 'أنثي';
        break;
        case 'other':
                if (app()->getLocale()=='en'){
                    return 'Other';
                }
                return 'أخري';
        break;

        }

    }




    public function devices(){
        return $this->hasMany('App\Models\Device','user_id','id');
    }
    /*
     *  ===============> User Relations <=================
     */
    public function videos(){
        return $this->hasMany(Video::class,'user_id');
    }

    public function my_rates(){
        return $this->hasMany(UserRate::class,'user_id');
    }

    /*
     * ==================> Coach Relations <================
     */
    public function players_favorites(){
        return $this->belongsToMany(User::class,'user_favorites','favoriter_id','user_id');
    }
    public function chats(){
        return $this->hasMany(Conversation::class,'user_id');
    }
}
