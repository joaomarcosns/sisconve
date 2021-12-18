<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = [
        'categoria_id',
        'nome_produto',
        'icms',
        'ipi',
        'frete',
        'acrescimo_despesas',
        'preco_na_fabrica',
        'preco_compra',
        'preco_venda',
        'lucro',
        'desconto',
        'quantidade',
        'ativo'
    ];
}
