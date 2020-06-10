<?php

namespace App\Http\Controllers;

use App\Estante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstanteRequest;

class EstanteController extends Controller
{
    
    public function index(){
        $estantes = Estante::query()
        ->where('ativo',true)
        ->orderBy('id')
        ->get();
        
        return response()->json($estantes, 200);
    }
    
    public function store(EstanteRequest $request){
        $estante = new Estante();
        $estante->fill($request->all());
        $estante->save();
        
        return response()->json($estante, 201);
    }

    public function create(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }

    public function show($id){
        $estante = Estante::find($id);
        if(!$estante){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        return response()->json($estante);
    }

    public function update(EstanteRequest $request, $id){
        if(!Estante::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Estante::where('id',$id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!Estante::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Estante::where('id', $id)->update(['ativo' => false]);
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
