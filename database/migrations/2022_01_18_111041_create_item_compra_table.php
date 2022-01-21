<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compra_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('icms', 10, 2);
            $table->decimal('ipi', 10, 2);
            $table->decimal('frete', 10, 2);
            $table->decimal('acrescimo_despesas', 10, 2)->default(4);
            $table->decimal('preco_na_fabrica', 10, 2);
            $table->decimal('preco_compra', 10, 2);
            $table->decimal('preco_venda', 10, 2);
            $table->decimal('lucro', 10, 2);
            $table->decimal('desconto', 10, 2);
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('compra_id')->references('id')->on('compra');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_item_compra');
    }
}
