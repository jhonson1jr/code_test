<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PedidosRequest;
use App\Lojas;
use App\Pedidos;
use App\PedidosProdutos;
use App\Produtos;

class PedidosController extends Controller
{
    
    /**
     * Retorna produtos mais vendidos por loja (id).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function maisVendidos($id)
    {
        $loja = Lojas::find($id);

        if(!$loja) {
            return response()->json([
                'message'   => 'Loja inexistente',
            ], 404);
        }

        $produtos = $loja->maisVendidos('DESC');

        return response()->json($produtos);
    }

    /**
     * Retorna produtos com baixo estoque (< 3) por loja (id).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function estoqueBaixo($id)
    {
        $loja = Lojas::find($id);

        if(!$loja) {
            return response()->json([
                'message'   => 'Loja inexistente',
            ], 404);
        }

        $produtos = $loja->estoqueBaixo('DESC');

        return response()->json($produtos);
    }
    
    /**
     * Retorna ticket medio por loja (id).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ticketMedio($id)
    {
        $loja = Lojas::find($id);

        if(!$loja) {
            return response()->json([
                'message'   => 'Loja inexistente',
            ], 404);
        }

        $ticket = $loja->ticketMedio();

        return response()->json([
            'ticketMedio' => $ticket
        ]);
    }

    /**
     * Registra novo pedido na base.
     *
     * @param  App\Http\Requests\FuncionariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(PedidosRequest $request)
    {
        // validando se os produtos existem na base e possuem estoque para venda
        if ($request->produtos) {
            foreach ($request->produtos as $p) {
                $produto = Produtos::find($p['id_produto']);
                if(!$produto) {
                    return response()->json([
                        'message'   => "Produto id {$p['id_produto']} inexistente",
                    ], 404);
                }
                if($produto->disponivel == 'n') {
                    return response()->json([
                        'message'   => "Produto id {$p['id_produto']} indisponível para venda",
                    ], 303);
                }
                if ($produto->qtde_estoque < $p['quantidade']) {
                    return response()->json([
                        'message'   => "Produto id {$p['id_produto']} com estoque insuficiente",
                    ], 401);
                }
                if ($produto->qtde_estoque == 0) {
                    return response()->json([
                        'message'   => "Produto id {$p['id_produto']} sem estoque para venda",
                    ], 401);
                }
            }
        }

        // salvando o pedido:
        $pedido = Pedidos::create([
            'nome_cliente' => $request->nome_cliente,
            'valor_frete' => $request->valor_frete,
            'id_loja' => $request->id_loja
        ]);

        // Salvando os produtos do pedido
        foreach ($request->produtos as $p) {
            $produto = Produtos::find($p['id_produto']);
            // Salvando o produto do pedido:
            PedidosProdutos::create([
                'quantidade' => $p['quantidade'],
                'preco' => ($produto->preco * $p['quantidade']), // valor individual x quantidade adquirida
                'id_pedido' => $pedido->id,
                'id_produto' => $produto->id,
            ]);

            // Decrementando o estoque:
            Produtos::where('id', $produto->id)->update(
                [
                    'qtde_estoque' => ($produto->qtde_estoque - $p['quantidade']),                    
                    'updated_at' => date('Y-m-d H:i:s')                    
                ]
            );
        }

        return response()->json([
            'message'   => "Pedido realizado com sucesso",
        ], 201);
    }
}
