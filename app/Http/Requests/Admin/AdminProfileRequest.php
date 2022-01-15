<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
        $id = auth('admin')->user()->id;
        return [
                'name' => 'required',
                'email' => "required|email|unique:users,email,{$id}",
                'password' => ($id ? 'nullable' : 'required')."|min:8"
        ];
    }
}
