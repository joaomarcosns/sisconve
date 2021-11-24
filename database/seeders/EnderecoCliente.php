<?php

namespace Database\Seeders;

use App\Models\EnderecoCliente as ModelsEnderecoCliente;
use Illuminate\Database\Seeder;

class EnderecoCliente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enderecoCliente = new ModelsEnderecoCliente();
        $enderecoCliente->cliente_id = 1;
        $enderecoCliente->cep = '64218-900';
        $enderecoCliente->logradouro = 'Rua João Pessoa';
        $enderecoCliente->numero = '100';
        $enderecoCliente->complemento = 'Apto 101';
        $enderecoCliente->bairro = 'Centro';
        $enderecoCliente->cidade = 'Cuiabá';
        $enderecoCliente->uf = 'MT';
        $enderecoCliente->save();
    }
}
