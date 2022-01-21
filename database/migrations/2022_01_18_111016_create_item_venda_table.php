<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_venda', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("produto_id");
            $table->unsignedInteger("venda_id");
            $table->decimal("valor_unitario", 10, 2);
            $table->integer("quantidade");
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
        Schema::dropIfExists('item_venda');
    }
}
