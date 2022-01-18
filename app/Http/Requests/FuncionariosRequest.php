<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionariosRequest extends FormRequest
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
            'nome_funcionario' => ["required", "string", "max:255"],
            'cpf' => ["required", "string", "max:255", "unique:funcionarios"],
            'telefone' => ["required", "string", "max:255"],
            'endereco' => ["required", "string", "max:255"],
            'cargo' => ["required", "string", "max:255"],
            'salario' => ["required", "numeric"],
        ];
    }

    public function messages()
    {
        return [
            'nome_funcionario.required' => 'O campo nome é obrigatório',
            'nome_funcionario.max' => 'O campo nome deve ter no máximo :max caracteres',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.max' => 'O campo CPF deve ter no máximo :max caracteres',
            'cpf.unique' => 'O CPF informado já está cadastrado',
            'telefone.required' => 'O campo telefone é obrigatório',
            'telefone.max' => 'O campo telefone deve ter no máximo :max caracteres',
            'endereco.required' => 'O campo endereço é obrigatório',
            'endereco.max' => 'O campo endereço deve ter no máximo :max caracteres',
            'cargo.required' => 'O campo cargo é obrigatório',
            'cargo.max' => 'O campo cargo deve ter no máximo :max caracteres',
            'salario.required' => 'O campo salário é obrigatório',
            'salario.numeric' => 'O campo salário deve ser numérico',
        ];
    }
}
