<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionariosRequest extends FormRequest
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
            'id_loja' => 'required',
            'nome_funcionario' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
    }
}
