<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Models\usuariotoken;

class UsuarioController extends Controller
{
    public function CadastroController(Request $request){
        return view('usuarios_cadastro');
    }

    public function salvar_usuario(Request $request){
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|',
        'senha' => 'required|string',
        'cpf' => 'required|string|max:11|',
        'data_nascimento' => 'nullable|date',
    ]);

        try {
            $usuario = new Usuario();
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = Hash::make($request->senha);
            $usuario->cpf = $request->cpf;
            $usuario->data_nacimento = $request->data_nacimento;

            $usuario->save();

            return response()->json(['message' => 'Usuário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar usuário!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }

    public function ver_usuario(Request $request){
            $request->validate([
                'id' => 'required|integer',
            ]);
            $usuario=Usuario::find($request->id);
            if($usuario){
                return response()->json(['usuario' => $usuario, 'erro' => 'n'], 200);
            }else{
                return response()->json(['message' => 'Usuário não encontrado!', 'erro' => 's'], 200);
            }
        }

        public function listar_usuarios(Request $request){
            $usuarios=Usuario::all();
            return response()->json(['usuarios' => $usuarios], 200);
        }

         public function listar_usuarios_simples(Request $request){
            $usuarios=Usuario::select( 'nome', 'email')->get();
            return response()->json(['usuarios' => $usuarios], 200);
        }

       public function alterar_usuario(Request $request){

        $request->validate([
        'id' => 'required|integer|exists:usuarios,id',
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|',
        'senha' => 'required|string|',
        'cpf' => 'required|string|max:11|',
        'data_nacimento' => 'nullable|date',
    ]);

        try {

        $usuario = Usuario::find($request->id);

        if($usuario->email != $request->cpf){
             $usuario_email_igual = Usuario::where('email', $request->email)->first();
            if($usuario_email_igual){
                return response()->json(['message' => 'Email já cadastrado!', 'erro' => 's'], 200);
                }
            }
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = Hash::make($request->senha);
            $usuario->cpf = $request->cpf;
            $usuario->data_nacimento = $request->data_nacimento;

            $usuario->save();

            return response()->json(['message' => 'Usuário alterado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar usuário!', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }

    public function login(Request $request){
            $request->validate([
                'email' => 'required|',
                'senha' => 'required|',
            ]);


            $usuario = Usuario::where('email','=', $request->email)->first();
            if($usuario){
                if(Hash::check($request->senha, $usuario->senha)){
                    $user_token = new usuariotoken();
                    $user_token->usuario_id = $usuario->id;
                    $user_token->token = Hash::make($usuario->id . $usuario->email . now());
                    $user_token->valido_ate = now()->addDays(7);
                    $user_token->save();
                    return response()->json(['message' => 'Login realizado com sucesso' , 'erro' => 'n', 'token' => $user_token->token],200 );

                }else{
                return response()->json(['message' => 'Usuario ou senha não encontrado', 'erro' => 's'],200);
            }

            }else{
                return response()->json(['message' => 'Email não encontrado', 'erro' => 's'],200);
            }
        }

         public function logout(Request $request){
            $request->validate([
                'usuario_id' => 'required|integer|exists:usuarios,id',
                'token' => 'required|string',
            ]);
    $token = usuariotoken::where('usuario_id', $request->usuario_id)
        ->where('token', $request->token)
        ->first();

    if ($token) {$token->delete();

        return response()->json(['message' => 'Logout realizado com sucesso','erro' => 'n'], 200);

    }return response()->json(['message' => 'Token não encontrado','erro' => 's'], 200);
}


}
