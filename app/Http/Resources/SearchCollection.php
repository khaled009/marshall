<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchCollection extends ResourceCollection
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
                'name'=>$query->getTable()=='users'?$query->name:$query->title,
                'image'=>asset($query->image),
                'type'=>$query->getTable(),
            ];
        });
    }
}
