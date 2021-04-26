<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = ['id_loja', 'nome_funcionario', 'email', 'password'];

    protected $hidden = ['password'];

    public function loja()
    {
        return $this->belongsTo('App\Lojas', 'id_loja', 'id');
    }
}
