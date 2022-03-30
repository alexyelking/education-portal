<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255|alpha_dash',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Enter name',
            'name.min' => 'Name is to short',
            'name.max' => 'Name is to beeg',
            'name.alpha_dash' => 'Name can only consists of charecters, numbers, udnerscores and dashes',

            'email.required' => 'Enter email',
            'email.email' => 'Wrong email',
            'email.max' => 'Email is to beeg',
            'email.unique' => 'Email is already used',

            'password.required' => 'Enter password',
            'password.min' => 'Password is to short',
            'password.confirmed' => 'Paswords is not mathc'
        ];
    }
}
