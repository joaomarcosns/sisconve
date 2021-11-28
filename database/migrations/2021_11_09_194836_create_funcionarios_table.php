<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_funcionario');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->string('endereco');
            $table->string('cargo');
            $table->decimal('salario');
            $table->string('email')->unique();
            $table->string('senha');
            $table->boolean("ativo")->default(true);
            $table->tinyInteger('nivel_acesso')->default(3)->comment('1 - Admin, 2 - Caixa, 3 - Funcionário');
            $table->dateTime('ultimo_login')->nullable();
            $table->unsignedBigInteger('id_caixa');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}