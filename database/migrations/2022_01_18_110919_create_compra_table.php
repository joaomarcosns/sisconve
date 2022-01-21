<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("funcionario_id");
            $table->unsignedBigInteger("fornecedor_id");
            $table->decimal("valor_total", 10, 2);
            $table->integer("parcela")->default(1);
            $table->timestamps();

            $table->foreign("funcionario_id")->references("id")->on("funcionarios");
            $table->foreign("fornecedor_id")->references("id")->on("fornecedores");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
