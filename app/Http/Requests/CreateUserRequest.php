<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required',
            'password'      => 'required|min:5',
            'email'         => 'required|email|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Nama wajib diisi.',
            'password.required'      => 'Password wajib diisi.',
            'password.min'           => 'Password minimal diisi dengan 5 karakter.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Email tidak valid.',
            'email.unique'           => 'Email sudah terdaftar.'
        ];
    }
}
