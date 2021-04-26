<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';

    protected $fillable = ['id_loja', 'nome_cliente', 'status', 'valor_frete'];

    public function loja()
    {
        return $this->belongsTo('App\Lojas', 'id_loja', 'id');
    }
    
    public function pedidos_produtos()
    {
        return $this->hasMany('App\PedidosProdutos', 'id_pedido', 'id');
    }    
}