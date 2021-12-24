<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaixaRequest extends FormRequest
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
            'numero_caixa' => ["required", "max:10", "min:2"]
        ];
    }

    public function messages()
    {
        return [
            'numero_caixa.required' => 'O campo nome é obrigatório',
            'numero_caixa.max' => 'O campo nome deve ter no máximo :max caracteres',
            'numero_caixa.min' => 'O campo nome deve ter no minimo :min caracteres',
        ];
    }
}
