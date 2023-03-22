<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MallResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // هخليه يرجعلي كولم معينة مش كلهم
        
        return [

            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
        ];
    }
}