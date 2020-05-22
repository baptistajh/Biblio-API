<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::query()
        ->orderBy('id')
        ->get();
        
        return response()->json($clientes, 200);
    }
    
    public function store(Request $request){
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->save();
        
        return response()->json($cliente, 201);
    }

    public function create(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }

    public function show($id){
        $cliente = Cliente::find($id);
        if(!$cliente){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        return response()->json($cliente);
    }

    public function update(Request $request, $id){
        if(!Cliente::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Cliente::where('id',$id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!Cliente::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Cliente::where('id', $id)->delete();
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
