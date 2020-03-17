<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class PlatformResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user=$request->user();
        $videos=$user->videos()->where('platform_id',$this->id)->get();
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'image'=>asset($this->image),
            'video'=>asset($this->video),
            'attempts'=>(int)$this->attempts,
            'videos_count'=>count($videos),
            'videos'=>VideoResource::collection($videos)
        ];
    }
}
