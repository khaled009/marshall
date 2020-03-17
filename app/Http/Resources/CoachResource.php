<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;

class CoachResource extends JsonResource
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
            'identify_image'=>asset($this->identify_image),
            'club_image'=>asset($this->club_image),
            'trainee_image'=>asset($this->trainee_image),
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'active'=>$this->active,
            'image'=> asset($this->image),
            'code'=>$this->code,
            'token'=>JWTAuth::fromUser($this),
        ];
    }
}
