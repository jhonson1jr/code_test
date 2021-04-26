<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosRequest extends FormRequest
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
            'nome_cliente' => 'required',
            'valor_frete' => 'required',
            'id_loja' => 'required'
        ];
    }
}
