<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Hash;

class PessoaController extends Controller
{
    public function CadastroController(Request $request){
        return view('usuarios_cadastro');
    }

    public function salvar_pessoa(Request $request){
    $request->validate([
        'nome' => 'required|string|max:255',
        'tipo' => 'required|string|max:255|unique:pessoas',
        'cpf' => 'required|string|max:255|unique:pessoas',
        'telefone' => 'required|string|',
    ]);

        try {
            $pessoa = new Pessoa();
            $pessoa->nome = $request->nome;
            $pessoa->tipo = $request->tipo;
            $pessoa->cpf = $request->cpf;
            $pessoa->telefone = $request->telefone;


            $pessoa->save();

            return response()->json(['message' => 'Pessoa cadastrada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar pessoa!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }

    public function ver_pessoa(Request $request){
            $request->validate([
                'id' => 'required|integer',
            ]);
            $pessoa=Pessoa::find($request->id);
            if($pessoa){
                return response()->json(['pessoa' => $pessoa, 'erro' => 'n'], 200);
            }else{
                return response()->json(['message' => 'Pessoa não encontrada!', 'erro' => 's'], 200);
            }
        }

        public function listar_pessoas(Request $request){
            $pessoas=Pessoa::all();
            return response()->json(['pessoas' => $pessoas], 200);
        }

         public function listar_pessoas_simples(Request $request){
            $pessoas=Pessoa::select( 'nome', 'cpf')->get();
            return response()->json(['pessoas' => $pessoas], 200);
        }

       public function alterar_pessoa(Request $request){

      
        $request->validate([
            'id' => 'required|integer',
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'telefone' => 'required|string',

    ]);


        try {

        $pessoa = Pessoa::find($request->id);

        $cpfEmUso = Pessoa::where('cpf', $request->cpf)
    ->where('id', '!=', $pessoa->id)
    ->exists();

if ($cpfEmUso) {
    return response()->json(['message' => 'CPF já cadastrado!', 'erro' => 's'], 200);
}

            $pessoa->nome = $request->nome;
            $pessoa->tipo = $request->tipo;
            $pessoa->cpf = $request->cpf;
            $pessoa->telefone = $request->telefone;


            $pessoa->save();

            return response()->json(['message' => 'Pessoa alterada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar pessoa!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }

    public function deletar_pessoa(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:pessoas,id',
        ]);

        try {
            $pessoa = Pessoa::find($request->id);
            $pessoa->delete();
            return response()->json(['message' => 'Pessoa deletada com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar pessoa!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

}
