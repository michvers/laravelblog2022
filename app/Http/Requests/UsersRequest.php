<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'roles' => 'required',
            'is_active' => 'required',
            'password' => 'required'
        ];
    }
    public function messages(){
        return[
            'email.required' => 'Email is required! Please fill out!',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!'
        ];
    }
}
