<?php

namespace Database\Seeders;

use App\Models\Caixa;
use Illuminate\Database\Seeder;

class CaixaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caixa = new Caixa();
        $caixa->numero_caixa = '1';
        $caixa->save();

        $caixaUm = new Caixa();
        $caixaUm->numero_caixa = '2';
        $caixaUm->save();
    }
}
