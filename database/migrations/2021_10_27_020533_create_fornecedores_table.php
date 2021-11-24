<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string("nome_fantasia", 200);
            $table->string("cnpj", 18);
            $table->string("tipo")->comment("MATRIZ OU FILIAL");
            $table->string("telefone", 12);
            $table->string("ddd", 2);
            $table->string("email", 100);
            $table->string("endereco", 200);
            $table->string("numero", 10);
            $table->string("cidade", 100);
            $table->string("uf", 2);
            $table->boolean("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}
