<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class Fornecedores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome_fantasia = "Adriana e Luzia Brinquedos Ltda";
        $fornecedor->cnpj = "19.332.921/0001-80";
        $fornecedor->tipo = "MATRIZ";
        $fornecedor->telefone = "9 8287-5077";
        $fornecedor->ddd = "19";
        $fornecedor->email = "sistema@adrianaeluziabrinquedrosltda.com.br";
        $fornecedor->endereco = "Rua Pedro Tumenas";
        $fornecedor->numero = "706";
        $fornecedor->cidade = "Limeira";
        $fornecedor->uf = "SP";
        $fornecedor->save();
    }
}
