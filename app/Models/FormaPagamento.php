<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    use HasFactory;
    protected $table = 'forma_pagamento';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo_pagamento'];
}
