<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'platform_id'=>$this->platform_id,
            'platform_title'=>$this->platform->title,
            'video'=>asset($this->video),
        ];
    }
}
