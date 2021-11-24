<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = "fornecedores";
    protected $fillable = [
        "nome_fantasia",
        "cnpj",
        "tipo",
        "telefone",
        "ddd",
        "email",
        "endereco",
        "numero",
        "cidade",
        "uf",
        "status"
    ];
}