<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("caixa_id");
            $table->unsignedBigInteger("cliente_id");
            $table->decimal("valor_total", 10, 2);
            $table->integer("parcela")->default(1);
            $table->boolean("devolvido")->default(false);
            $table->timestamps();

            $table->foreign("caixa_id")->references("id")->on("caixas");
            $table->foreign("cliente_id")->references("id")->on("clientes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda');
    }
}
