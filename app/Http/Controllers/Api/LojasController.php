<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lojas;

class LojasController extends Controller
{
    /**
     * Retorna listagem geral de lojas cadastradas.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $lojas = Lojas::all();
        return response()->json($lojas);
    }
    
    /**
     * Retorna dados de loja específica por id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalhes($id)
    {
        $loja = Lojas::find($id);

        if(!$loja) {
            return response()->json([
                'message'   => 'Loja inexistente',
            ], 404);
        }

        return response()->json($loja);
    }
}
