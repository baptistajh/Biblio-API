<?php

namespace App\Http\Controllers;

use App\Corredor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CorredorController extends Controller
{
    public function index(){
        $corredores = Corredor::query()
        ->where('ativo',true)
        ->orderBy('letra')
        ->get();
        
        return response()->json($corredores, 200);
    }
    
    public function store(Request $request){
        $corredor = new Corredor();
        $corredor->fill($request->all());
        $corredor->save();
        
        return response()->json($corredor, 201);
    }

    public function create(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }

    public function show($id){
        $corredor = Corredor::find($id);
        if(!$corredor){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        return response()->json($corredor);
    }

    public function update(Request $request, $id){
        if(!Corredor::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Corredor::where('id',$id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!Corredor::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Corredor::where('id', $id)->update(['ativo' => false]);
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
