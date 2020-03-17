<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatCollection extends ResourceCollection
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
//            dd($query);
            return [
                'id'=>$query->id,
                'player_id'=>$query->player_id,
                'player_name'=>$query->player->name,
                'player_image'=>asset($query->player->image),
                'player_rates'=>$query->player->rates,
                'last_message'=>new MessageResource($query->messages()->latest()->first())
            ];
        });
    }
}
