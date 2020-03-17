<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'rater_id'=>$this->rater->id,
            'rater_name'=>$this->rater->name,
            'rater_image'=>asset($this->rater->image),
            'rate'=>$this->rate,
            'comment'=>$this->comment
        ];
    }
}
