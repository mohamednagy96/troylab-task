<?php

namespace App\Http\Requests\Admin\School;

use Illuminate\Foundation\Http\FormRequest;

class SchoolUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

         $id = $this->school->id;

        return [
            'title'=>['required' ,'max:191' ,'string'],
            'description'=>['nullable' ,'string'],
            'level_count'=>['required' , 'numeric'],
            'is_active'=>['nullable' ,'boolean '],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->is_active ? 1 : 0,         
        ]);
    }
}
