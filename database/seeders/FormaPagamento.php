<?php

namespace Database\Seeders;

use App\Models\FormaPagamento as ModelsFormaPagamento;
use Illuminate\Database\Seeder;

class FormaPagamento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formaPagamentoVenda = new ModelsFormaPagamento();
        $formaPagamentoVenda->tipo_pagamento = 'Dinheiro';
        $formaPagamentoVenda->save();

        $formaPagamentoVenda1 = new ModelsFormaPagamento();
        $formaPagamentoVenda1->tipo_pagamento = 'Cartão de Crédito';
        $formaPagamentoVenda1->save();

        $formaPagamentoVenda2 = new ModelsFormaPagamento();
        $formaPagamentoVenda2->tipo_pagamento = 'Cartão de Débito';
        $formaPagamentoVenda2->save();
    }
}
