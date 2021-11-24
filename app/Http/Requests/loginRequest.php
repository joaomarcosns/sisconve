<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'senha' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O E-mail é necessario',
            'email.email' => 'E-mail Invalido',
            'senha.required' => 'A senha é necessaria',
        ];
    }
}
