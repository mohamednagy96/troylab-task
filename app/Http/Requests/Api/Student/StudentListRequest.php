<?php

namespace App\Http\Requests\Api\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "school_id" => "nullable|exists:schools,id",
            'page' => "nullable|numeric",
        ];
    }
    
}
