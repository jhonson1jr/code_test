<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_cliente');
            $table->enum('status',['novo', 'pago', 'entregue', 'cancelado']);
            $table->decimal('valor_frete', 9,2)->unsigned();
            $table->integer('id_loja')->unsigned();
            $table->foreign('id_loja')->references('id')->on('lojas');
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
        Schema::dropIfExists('pedidos');
    }
}
