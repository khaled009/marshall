<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type'=>$this->type,
            'name'=>$this->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'age'=>$this->when($this->type=='user',$this->age),
            'height'=>$this->when($this->type=='user',$this->height),
            'weight'=>$this->when($this->type=='user',$this->weight),
            'position'=>$this->when($this->type=='user',$this->position),
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'foot'=>$this->when($this->type=='user',$this->foot),
            'active'=>$this->active,
//            'GenderName'=>$this->genderName,
            'image'=> asset($this->image),
            'code'=>$this->code,
            'token'=>JWTAuth::fromUser($this),
        ];
    }
}
