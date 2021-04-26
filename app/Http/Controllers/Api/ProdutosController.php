<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutosRequest;
use App\Produtos;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $produtos = Produtos::where('disponivel', 's')->get();
        return response()->json($produtos);
    }
    
    /**
     * Retorna dados de produto específico por id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalhes($id)
    {
        $produto = Produtos::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Produto inexistente',
            ], 404);
        }

        return response()->json($produto);
    }

    /**
     * Registra novo produto na base.
     *
     * @param  App\Http\Requests\ProdutosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(ProdutosRequest $request)
    {
        $produto = new Produtos();
        $produto->fill($request->all());
        $produto->save();

        return response()->json($produto, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ProdutosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(ProdutosRequest $request, $id)
    {
        $produto = Produtos::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Produto inexistente',
            ], 404);
        }

        $produto->fill($request->all());
        $produto->save();

        return response()->json($produto, 200);
    }

    /**
     * Indisponibiliza produto para venda por id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remover($id)
    {
        
        $produto = Produtos::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Produto inexistente',
            ], 404);
        }

        $produto->disponivel = 'n';
        $produto->save();
        return response()->json($produto, 200);
    }
}
