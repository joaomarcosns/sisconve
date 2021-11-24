<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatosCliente extends Model
{
    use HasFactory;
    protected $table = 'contatos_clientes';
    protected $fillable = [
        'cliente_id', 
        'email', 
        'celular',
    ];
}
