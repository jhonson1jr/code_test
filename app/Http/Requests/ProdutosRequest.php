<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Validação dos campos da request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo' => 'required',
            'nome_produto' => 'required',
            'codigo' => 'required',
            'qtde_estoque' => 'required|min:1',
            'preco' => 'required',
            'tipo' => 'required',
            'id_loja' => 'required',
        ];
    }
}
