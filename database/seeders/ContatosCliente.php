<?php

namespace Database\Seeders;

use App\Models\ContatosCliente as ModelsContatosCliente;
use Illuminate\Database\Seeder;

class ContatosCliente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contatosCliente = new ModelsContatosCliente();
        $contatosCliente->cliente_id = 1;
        $contatosCliente->email = "pedroerickhenrysilva__pedroerickhenrysilva@clubedorei.com.br";
        $contatosCliente->celular = "9 8121-8221";
        $contatosCliente->ddd = "77";
        $contatosCliente->save();
    }
}
