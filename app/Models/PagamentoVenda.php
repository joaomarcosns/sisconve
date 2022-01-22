<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoVenda extends Model
{
    use HasFactory;
    protected $table = 'pagamento_venda';
    protected $primaryKey = 'id';
    protected $fillable = [
        'venda_id',
        'forma_pagamento_id',
        'parcela',
        'data_pagamento',
        'status',
        'valor_pago'
    ];
}
