<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorTotalToItemVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_venda', function (Blueprint $table) {
            $table->decimal('valor_total', 10, 2)->after('valor_unitario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_venda', function (Blueprint $table) {
            $table->dropColumn('valor_total');
        });
    }
}
