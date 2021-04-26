<?php

use Illuminate\Http\Request;

// Rota raiz padrão, apenas para verificação:
    Route::get('/', function () {
        return response()->json(['message' => 'APIs Laravel', 'status' => 'Conectado']);;
    });


// Rotas sem controle por token:

// Login de funcionario:
    Route::post('funcionarios/login', 'Api\\AuthController@login');
// Cadastro de funcionarios
    Route::post('funcionarios/salvar', 'Api\\FuncionariosController@salvar');

// Rotas protegidas por token:
    Route::group(['middleware' => ['apiJWT']], function()
    {
        // Lojas:
        Route::get('lojas/listar', 'Api\\LojasController@listar');
        Route::get('lojas/detalhes/{id?}', 'Api\\LojasController@detalhes')->defaults('id', 0);

        // Produtos:    
        Route::get('produtos/listar', 'Api\\ProdutosController@listar');
        Route::get('produtos/detalhes/{id?}', 'Api\\ProdutosController@detalhes')->defaults('id', 0);
        Route::post('produtos/salvar', 'Api\\ProdutosController@salvar');
        Route::put('produtos/atualizar/{id?}', 'Api\\ProdutosController@atualizar')->defaults('id', 0);
        Route::delete('produtos/remover/{id?}', 'Api\\ProdutosController@remover')->defaults('id', 0);

        // Funcionarios:
        Route::get('funcionarios/listar', 'Api\\FuncionariosController@listar');
        Route::get('funcionarios/detalhes/{id?}', 'Api\\FuncionariosController@detalhes')->defaults('id', 0);
        Route::put('funcionarios/atualizar/{id?}', 'Api\\FuncionariosController@atualizar')->defaults('id', 0);

        // Pedidos:
        Route::get('pedidos/maisvendidos/{id?}', 'Api\\PedidosController@maisVendidos')->defaults('id', 0); // listagem de produtos mais vendidos por loja
        Route::get('pedidos/estoquebaixo/{id?}', 'Api\\PedidosController@estoqueBaixo')->defaults('id', 0); // listagem de produtos com estoque abaixo de 3 por loja
        Route::get('pedidos/ticketmedio/{id?}', 'Api\\PedidosController@ticketMedio')->defaults('id', 0); // ticket medio por loja
        Route::post('pedidos/salvar', 'Api\\PedidosController@salvar');
        Route::put('pedidos/atualizar/{id?}', 'Api\\PedidosController@atualizar')->defaults('id', 0);
    });