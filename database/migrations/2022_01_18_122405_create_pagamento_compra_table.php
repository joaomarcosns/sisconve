<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentoCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento_compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compra_id');
            $table->unsignedBigInteger('forma_pagamento_id');
            $table->decimal('parcela', 10, 2);
            $table->date('data_pagamento');
            $table->string('status')->default('Pendente');
            $table->timestamps();

            $table->foreign('compra_id')->references('id')->on('compra');
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
        Schema::dropIfExists('_pagamento_compra');
    }
}
