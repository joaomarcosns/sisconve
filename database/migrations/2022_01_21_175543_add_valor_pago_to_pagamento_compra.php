<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorPagoToPagamentoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagamento_compra', function (Blueprint $table) {
            $table->decimal('valor_pago', 10, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagamento_compra', function (Blueprint $table) {
            $table->dropColumn('valor_pago');
        });
    }
}
