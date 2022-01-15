<?php

namespace App\Http\Requests\Api\Student;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'name'=>['required' ,'max:191' ,'string '],
            'parent_number'=>['required' ,'max:191' ,'string'],
            'email'=>['required' ,"unique:students,email",'max:191' ,'string '],
            'mobile'=>['required' ,'max:191' ,'string '],
            'is_active'=>['nullable' ,'boolean '],
            'code'=>['required' ,'max:191' ,'string ' ,"unique:students,code"],
            'dob'=>['required' ,'string '],
            'gender' => 'required|in:male,female',
            'join_date'=>['required' ,'string '],
            'level' => 'required|string',
            'school_id' => 'required|exists:schools,id'
        ];

    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->is_active ? 1 : 0,         
        ]);
    }
}
