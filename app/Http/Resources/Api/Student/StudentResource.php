<?php

namespace App\Http\Resources\Api\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'code' => $this->code,
            'level' => $this->level,
            'mobile' => $this->mobile,
            'parent_number' => $this->parent_number,
            'school' => $this->school->title,
            'dob' => $this->dob,
            'join_date' => $this->join_date,
            'is_active' => $this->is_active ? 'true' : 'false',
        ];
        // return parent::toArray($request);
    }
}
