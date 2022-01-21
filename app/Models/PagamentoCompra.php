<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoCompra extends Model
{
    use HasFactory;
    protected $table = 'pagamento_compra';
    protected $fillable = [
        'compra_id',
        'forma_pagamento_id',
        'parcela',
        'status',
        'valor_pago',
        'data_pagamento',
    ];
}
