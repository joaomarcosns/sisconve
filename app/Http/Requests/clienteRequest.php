<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'data_nacimento' => 'required|date',
            'cpf' => 'required|max:14|min:14',
            'cep' => 'required|max:9|min:9',
            'email' => 'required|max:255',
            'ddd' => 'required|max:2',
            'telefone' => 'required',
            'rua' => 'required|max:255',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:2',
            'complemento' => 'required|max:255',
            
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres',
            'data_nacimento.required' => 'O campo data de nascimento é obrigatório',
            'data_nacimento.date' => 'O campo data de nascimento deve ser uma data válida',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.max' => 'O campo cpf deve ter no máximo :max caracteres',
            'cpf.min' => 'O campo cpf deve ter no mínimo :min caracteres',
            'cep.required' => 'O campo cep é obrigatório',
            'cep.max' => 'O campo cep deve ter no máximo :max caracteres',
            'cep.min' => 'O campo cep deve ter no mínimo :min caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres',
            'ddd.required' => 'O campo ddd é obrigatório',
            'ddd.max' => 'O campo ddd deve ter no máximo :max caracteres',
            'telefone.required' => 'O campo telefone é obrigatório',
            'rua.required' => 'O campo rua é obrigatório',
            'rua.max' => 'O campo rua deve ter no máximo :max caracteres',
            'numero.required' => 'O campo numero é obrigatório',
            'numero.max' => 'O campo numero deve ter no máximo :max caracteres',
            'bairro.required' => 'O campo bairro é obrigatório',
            'bairro.max' => 'O campo bairro deve ter no máximo :max caracteres',
            'cidade.required' => 'O campo cidade é obrigatório',
            'cidade.max' => 'O campo cidade deve ter no máximo :max caracteres',
            'estado.required' => 'O campo estado é obrigatório',
            'estado.max' => 'O campo estado deve ter no máximo :max caracteres',

            
        ];
    }
}
