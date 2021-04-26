<?php

namespace App\Http\Controllers\Api;

use App\Funcionarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FuncionariosRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $funcionarios = Funcionarios::all();
        return response()->json($funcionarios);
    }
    
    /**
     * Retorna dados de funcionario específico por id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalhes($id)
    {
        $funcionario = Funcionarios::find($id);

        if(!$funcionario) {
            return response()->json([
                'message'   => 'Funcionario inexistente',
            ], 404);
        }

        return response()->json($funcionario);
    }

    
    /**
     * Registra novo funcionario na base.
     *
     * @param  App\Http\Requests\FuncionariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(FuncionariosRequest $request)
    {
        $funcionario = Funcionarios::create([
            'id_loja' => $request->id_loja,
            'nome_funcionario' => $request->nome_funcionario,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        try {
            // Enviando e-mail de cadastro realizado (inseriri dados de conexao com conta válida de e-mail no arquivo .env):
            $nome_destinatario = $request->nome_funcionario;
            $email_destinatario = $request->email;
            
            Mail::send([], [], function($message) use ($nome_destinatario, $email_destinatario) {
                $message->to($email_destinatario, $nome_destinatario)
                        ->subject("Novo Cadastro")
                        ->setBody("<br>Bem-vindo {$nome_destinatario}<br>Cadsatro realizado com sucesso!", 'text/html');
                $message->from("naoresponder@teste.com","Plataforma Lojas");
            });
        } catch (\Throwable $th) {
            // Não lançamos exceção, caso não queiram vincular a aplicação a nenhum provedor de e-mail, assim as funcionalidades permanecem disponíveis
        }
        
        
        return response()->json($funcionario, 201);
    }

    /**
     * Atualiza dados de funcionario especifico por id.
     *
     * @param  App\Http\Requests\FuncionariosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(FuncionariosRequest $request, $id)
    {
        $funcionario = Funcionarios::find($id);

        if(!$funcionario) {
            return response()->json([
                'message'   => 'Funcionario inexistente',
            ], 404);
        }

        $funcionario->id_loja = $request->id_loja;
        $funcionario->nome_funcionario = $request->nome_funcionario;
        $funcionario->email = $request->email;
        $funcionario->password = Hash::make($request->password);
        
        $funcionario->save();

        return response()->json($funcionario, 200);
    }
}
