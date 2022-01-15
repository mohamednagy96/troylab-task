<?php

namespace App\Http\Resources\Api\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentsResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'level' => $this->level,
            'school' => $this->school->title,
        ];
        // return parent::toArray($request);
    }
}
