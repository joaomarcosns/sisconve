<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class Clientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cleintes = new Cliente();
        $cleintes->nome = 'Pedro Erick Henry Silva';
        $cleintes->cpf = '322.266.973-22';
        $cleintes->data_nacimento = "1957-12-15";
        $cleintes->save();
    }
}
