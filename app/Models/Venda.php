<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $table = 'venda';
    protected $primaryKey = 'id';
    protected $fillable = [
        'caixa_id',
        'cliente_id',
        'valor_total',
        'parcela',
        'devolvido'
    ];
}
