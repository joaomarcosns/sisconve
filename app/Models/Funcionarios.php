<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionarios extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome_funcionario',
        'cpf',
        'telefone',
        'endereco',
        'cargo',
        'salario',
        'email',
        'senha',
        "ativo",
        'id_caixa'
    ];
}
