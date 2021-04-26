<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['id_loja', 'codigo', 'nome_produto', 'descricao', 'qtde_estoque', 'preco', 'peso', 'dimensao', 'tipo'];

    public function loja()
    {
        return $this->belongsTo('App\Lojas', 'id_loja', 'id');
    }
    
    public function produtos_pedidos()
    {
        return $this->hasMany('App\ProdutosPedidos', 'id_produto', 'id');
    }
}
