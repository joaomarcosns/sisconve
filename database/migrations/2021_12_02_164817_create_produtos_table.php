<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->string('nome_produto');
            $table->double('icms', 8,2)->default(0);
            $table->double('ipi', 8,2)->default(0);
            $table->double('frete', 8,2)->default(0);
            $table->double('acrescimo_despesas', 8,2)->default(0);
            $table->double('preco_na_fabrica', 8,2)->default(0);
            $table->double('preco_compra', 8,2)->default(0);
            $table->double('preco_venda', 8,2)->default(0);
            $table->double('lucro', 8,2)->default(0);
            $table->double('desconto', 8,2)->default(0);
            $table->integer('quantidade')->default(0);
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
