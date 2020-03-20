<?php

namespace App\Http\Controllers;

use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivroController extends Controller
{
    public function index(){
        $livros = Livro::query()
        ->orderBy('id')
        ->get();
        
        return response()->json($livros, 200);
    }
    
    public function store(Request $request){
        $livro = new Livro();
        $livro->fill($request->all());
        $livro->save();
        
        return response()->json($livro, 201);
    }

    public function create(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }

    public function show($id){
        $livro = Livro::find($id);
        if(!$livro){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        return response()->json($livro);
    }

    public function update(Request $request, $id){
        if(!Livro::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Livro::where('id',$id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!Livro::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Livro::where('id', $id)->delete();
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
