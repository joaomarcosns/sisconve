<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCompra extends Model
{
    use HasFactory;
    protected $table = 'item_compra';
    protected $fillable = [
        'compra_id',
        'produto_id',
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
    ];	
}
