<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|exists:users,email|min:2|max:255',
            "password" => 'required|min:8|max:255',
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'email' =>  strtolower($this->email)
        ]);
    }
}
