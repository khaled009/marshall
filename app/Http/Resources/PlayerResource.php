<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $is_fav=0;
        if ($request->header('Authorization')){
            $user=JWTAuth::parseToken()->toUser();
            $is_fav = !is_null($user->players_favorites()->where('user_id',$this->id)->first())?1:0;
        }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image'=>asset($this->image),
            'rates'=>round($this->rates,1),
            'is_fav'=>$is_fav,
        ];
    }
}
