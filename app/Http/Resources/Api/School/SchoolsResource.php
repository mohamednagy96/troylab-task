<?php

namespace App\Http\Resources\Api\School;

use Illuminate\Http\Resources\Json\JsonResource;

class SchoolsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [ 
            'id' => $this->id,
            'title' => $this->title,
            'is_active' => $this->is_active == 1 ? 'true' : 'false'
        ];
        // return parent::toArray($request);
    }
}
