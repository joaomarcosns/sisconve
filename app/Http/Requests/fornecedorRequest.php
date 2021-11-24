<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fornecedorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome_fantasia' => ['required', 'max:100', 'min:3'],
            'cnpj' => ['required','min:18','max:18'],
            'tipo' => ['required'],
            'telefone' => ['required'],
            'ddd' => ['required'],
            'email' => ['required', 'email'],
            'endereco' => ['required'],
            'numero' => ['required'],
            'cidade' => ['required'],
            'uf' => ['required', 'min:2', 'max:2'],

        ];
    }

    public function messages()
    {
        return [
            
            'nome_fantasia.required' => 'O campo é obrigatório',
            'cnpj.required' => 'O campo é obrigatório',
            'tipo.required' => 'O campo é obrigatório',
            'telefone.required' => 'O campo é obrigatório',
            'ddd.required' => 'O campo é obrigatório',
            'endereco.required' => 'O campo é obrigatório',
            'numero.required' => 'O campo é obrigatório',
            'cidade.required' => 'O campo é obrigatório',
            'uf.required' => 'O campo é obrigatório',
            'email.required' => 'O campo é obrigatório',

            "email.email" => "Email inválido",

            "cnpj.min" => "CNPJ inválido, tanho do campo :min",
            "cnpj.max" => "CNPJ inválido, tanho do campo :max",

            "uf.min" => "Estado inválido, tanho do campo :min",
            "uf.max" => "Estado inválido, tanho do campo :max",

        ];
    }
}
