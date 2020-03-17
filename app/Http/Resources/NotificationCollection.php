<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($query){
            return [
                'id'=>$query->id,
                'title'=>$query->title,
                'body'=>$query->body,
                'type'=>$query->type
            ];
        });
    }
}
