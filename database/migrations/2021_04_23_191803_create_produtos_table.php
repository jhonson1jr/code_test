<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nome_produto');
            $table->longText('descricao');
            $table->integer('qtde_estoque')->unsigned();
            $table->decimal('preco', 9,2)->unsigned();
            $table->decimal('peso', 9,2)->unsigned();
            $table->string('dimensao');
            $table->enum('tipo',['seco', 'refrigerado']);
            $table->enum('disponivel',['s', 'n']);
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
        Schema::dropIfExists('produtos');
    }
}
