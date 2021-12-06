<?php

namespace Database\Seeders;

use App\Models\Produtos;
use Illuminate\Database\Seeder;

class Produto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = new Produtos();
        $produtos->nome_produto = 'Boneca XX';
        $produtos->categoria_id = 1;
        $produtos->save();
    }
}
