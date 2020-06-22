<?php

namespace App\Http\Controllers;

use App\Livro;
use Illuminate\Http\Request;
use App\Http\Requests\LivroRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    public function index(){
        $livros = DB::table('livros')
        ->join('corredores', 'corredores.id', '=', 'id_corredor')
        ->join('estantes', 'estantes.id', '=', 'id_estante')
        ->join('prateleiras', 'prateleiras.id', '=', 'id_prateleira')
        ->select(
            'livros.id',
            'livros.nome',
            'livros.autor',
            'livros.edicao',
            'livros.local',
            'livros.editora',
            'livros.ano',
            'livros.emprestado', 
            'corredores.letra as corredor', 
            'estantes.numero as estante', 
            'prateleiras.numero as prateleira', 
            'livros.ativo')
        ->where('livros.ativo', true)
        ->orderBy('livros.id')
        ->get();

        $livros_disponiveis = Livro::query()
        ->where('ativo', true)
        ->where('emprestado', false)
        ->orderBy('id')
        ->get();


        
        
        return response()->json([
            'livros' => $livros,
            'livros_disponiveis' => $livros_disponiveis
        ], 200);
    }
    
    public function store(LivroRequest $request){
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

    public function update(LivroRequest $request, $id){
        if(!Livro::where('id', $id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        Livro::where('id', $id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!Livro::where('id', $id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        if(Livro::where('id', $id)->where('emprestado', true)){
            return response()->json(['message'=>'Este livro está emprestado.'],404);
        }
        Livro::where('id', $id)->update(['ativo' => false]);
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
