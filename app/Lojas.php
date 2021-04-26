<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lojas extends Model
{
    protected $table = 'lojas';

    protected $fillable = ['nome_loja'];

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionarios', 'id_loja', 'id');
    }
    
    public function produtos()
    {
        return $this->hasMany('App\Produtos', 'id_loja', 'id');
    }
    
    public function pedidos()
    {
        return $this->hasMany('App\Pedidos', 'id_loja', 'id');
    }
    
    // Obtenção dos produtos mais vendidos ordenados pela quantidade:
    public function maisVendidos($orderBy)
    {
        return $this->pedidos()
                    ->join('pedidos_produtos', 'pedidos_produtos.id_pedido', '=', 'pedidos.id')
                    ->join('produtos', 'pedidos_produtos.id_produto', '=', 'produtos.id')
                    ->select('produtos.nome_produto', 'pedidos_produtos.quantidade')
                    ->orderBy('quantidade', $orderBy)
                    ->get();
    }
    
    // Obtenção dos produtos com estoque abaixo de 3:
    public function estoqueBaixo($orderBy)
    {
        return $this->produtos()->where('qtde_estoque', '<', 3)
                    ->select('nome_produto', 'qtde_estoque')
                    ->orderBy('qtde_estoque', $orderBy)
                    ->get();
    }
    
    // Cálculo do ticket médio das vendas:
    public function ticketMedio()
    {
        $valor_total_vendas = $this->pedidos()
                                   ->join('pedidos_produtos', 'pedidos_produtos.id_pedido', '=', 'pedidos.id')
                                   ->sum('preco');
        $numero_vendas = $this->pedidos()
                              ->count('id');
        if ($numero_vendas > 0) {
            return $valor_total_vendas / $numero_vendas;
        }
        return 0;
    }
}
