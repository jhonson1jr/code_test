<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade')->unsigned();
            $table->decimal('preco', 9,2)->unsigned();
            $table->integer('id_pedido')->unsigned();
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_produto')->references('id')->on('produtos');
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
        Schema::dropIfExists('pedidos_produtos');
    }
}
