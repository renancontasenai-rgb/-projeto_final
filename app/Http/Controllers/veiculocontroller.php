<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class veiculocontroller extends Controller
{


    public function salvar_veiculo(Request $request){
        $request->validate([
            'placa' => 'required|string|max:8|unique:veiculo',
            'modelo' => 'required|string|max:255',
            'cor' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'pessoas_id' => 'required|integer|exists:pessoas,id',
        ]);

        try{
            $veiculo = new Veiculo();
            $veiculo->placa = $request->placa;
            $veiculo->modelo = $request->modelo;
            $veiculo->cor = $request->cor;
            $veiculo->tipo = $request->tipo;
            $veiculo->pessoas_id = $request->pessoas_id;

            $veiculo->save();

            return response()->json(['message' => 'Veículo cadastrado com sucesso!', 'erro' => 'n'], 200);
        }
        catch(\Throwable $th){
            return response()->json(['message' => 'Erro ao cadastrar veículo.', 'erro'  => $th->getMessage()], 200);
        }
    }


    public function listar_veiculos(Request $request){
        $veiculo=Veiculo::all();
        return response()->json(['veiculo' => $veiculo], 200);
    }

    public function alterar_veiculo(Request $request){

        $request->validate([
        'id' => 'required|integer|exists:veiculo,id',
        'placa' => 'required|string|max:8|unique:veiculo,placa,' . $request->id,
        'modelo' => 'required|string|max:255',
        'cor' => 'required|string|max:255',
        'tipo' => 'required|string|max:50',
        'pessoas_id' => 'required|integer|exists:pessoa,id',
        ]);

        try{
            $veiculo = Veiculo::find($request->id);
            $veiculo->placa = $request->placa;
            $veiculo->marca = $request->marca;
            $veiculo->modelo = $request->modelo;
            $veiculo->cor = $request->cor;
            $veiculo->tipo = $request->tipo;
            $veiculo->pessoas_id = $request->pessoas_id;

            $veiculo->save();

            return response()->json(['message' => 'Veículo alterado com sucesso!', 'erro' => 'n'], 200);
        }
        catch(\Throwable $th){
            return response()->json(['message' => 'Erro ao alterar veículo.', 'erro'  => $th->getMessage()], 200);
        }
    }

    public function ver_veiculo(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $veiculo = Veiculo::find($request->id);
        if ($veiculo) {
            return response()->json(['veiculo' => $veiculo, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Veículo não encontrado!', 'erro' => 's'], 200);
        }
    }

    public function deletar_veiculo(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:veiculos,id',
        ]);

        try {
            $veiculo = Veiculo::find($request->id);
            $veiculo->delete();

            return response()->json(['message' => 'Veículo deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar veículo.', 'erro'  => $th->getMessage()], 200);
        }
    }

    public function listar_veiculos_simples(Request $request)
    {
        $veiculos = Veiculo::select('id', 'placa')->get();
        return response()->json(['veiculos' => $veiculos], 200);
    }


}
