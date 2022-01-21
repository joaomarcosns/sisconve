<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentoVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento_venda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venda_id');
            $table->unsignedBigInteger('forma_pagamento_id');
            $table->decimal('parcela', 10, 2);
            $table->date('data_pagamento');
            $table->string('status')->default('Pendente');
            $table->timestamps();

            $table->foreign('venda_id')->references('id')->on('venda');
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamento');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamento_venda');
    }
}
