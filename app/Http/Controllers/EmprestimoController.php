<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmprestimoController extends Controller
{
    public function index(){
        $emprestimos = Emprestimo::query()
        ->where('ativo',true)
        ->orderBy('data_emprestimo')
        ->get();
        
        return response()->json($emprestimos, 200);
    }
    
    public function store(Request $request){
        $emprestimo = new Emprestimo();
        $emprestimo->fill($request->all());
        $emprestimo->save();
        
        return response()->json($emprestimo, 201);
    }

    public function create(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }

    public function show($id){
        $emprestimo = Emprestimo::find($id);
        if(!$emprestimo){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        return response()->json($emprestimo);
    }

    public function update(Request $request, $id){
        if(!Emprestimo::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Emprestimo::where('id',$id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!Emprestimo::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Emprestimo::where('id', $id)->update(['ativo' => false]);
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
