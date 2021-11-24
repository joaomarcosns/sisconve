<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoCliente extends Model
{
    use HasFactory;
    protected $table = 'endereco_clientes';
    protected $fillable = [
        'cliente_id', 
        'cep', 
        'logradouro', 
        'numero', 
        'complemento', 
        'bairro', 
        'cidade', 
        'uf'
    ];
}
