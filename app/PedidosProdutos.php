<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidosProdutos extends Model
{
    protected $table = 'pedidos_produtos';

    protected $fillable = ['quantidade', 'preco', 'id_pedido', 'id_produto'];
    
    public function pedidos()
    {
        return $this->belongsTo('App\Pedidos', 'id_pedido', 'id');
    }
    
    public function produtos()
    {
        return $this->belongsTo('App\Produtos', 'id_produto', 'id');
    }
}