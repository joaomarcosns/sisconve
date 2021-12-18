<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'nome_categoria' => ['required', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'nome_categoria.required' => 'O campo nome é obrigatório',
            'nome_categoria.max' => 'O campo nome deve ter no máximo :max caracteres',
        ];
    }
}
