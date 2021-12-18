<?php

namespace Database\Seeders;

use App\Models\Categoria as ModelsCategoria;
use Illuminate\Database\Seeder;

class Categoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new ModelsCategoria();
        $categoria->nome_categoria = 'Brinquedos';
        $categoria->save();

    }
}
