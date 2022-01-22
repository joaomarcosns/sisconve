<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorPagoToPagamentoVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagamento_venda', function (Blueprint $table) {
            $table->decimal('valor_pago', 10, 2)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagamento_venda', function (Blueprint $table) {
            $table->dropColumn('valor_pago');
        });
    }
}
