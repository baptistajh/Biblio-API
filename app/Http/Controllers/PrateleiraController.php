<?php

namespace App\Http\Controllers;

use App\Prateleira;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrateleiraRequest;

class PrateleiraController extends Controller
{
    public function index(){
        $prateleiras = Prateleira::query()
        ->where("ativo",true)
        ->orderBy('numero')
        ->get();
        
        return response()->json($prateleiras, 200);
    }
    
    public function store(PrateleiraRequest $request){
        $prateleira = new Prateleira();
        $prateleira->fill($request->all());
        $prateleira->save();
        
        return response()->json($prateleira, 201);
    }

    public function create(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }

    public function show($id){
        $prateleira = Prateleira::find($id);
        if(!$prateleira){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        return response()->json($prateleira);
    }

    public function update(PrateleiraRequest $request, $id){
        if(!Prateleira::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Prateleira::where('id',$id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!Prateleira::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Prateleira::where('id', $id)->update(['ativo' => false]);
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
