<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'message'=>$this->message,
            'conversation_id'=>$this->conversation_id,
            'type'=>$this->type,
            'sender_id'=>$this->user_id,
            'sender_image'=>asset($this->sender->image),
        ];
    }
}
