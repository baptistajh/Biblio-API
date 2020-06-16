<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmprestimoRequest;
use Illuminate\Support\Facades\DB;

class EmprestimoController extends Controller
{
    public function index(){
        $emprestimos = DB::table('emprestimos')
            ->join('clientes', 'clientes.id', '=', 'id_cliente')
            ->join('livros', 'livros.id', '=', 'id_livro')
            ->select(
                'emprestimos.id',
                'emprestimos.dia_emprestimo',
                'emprestimos.dia_devolucao',
                'clientes.nome as cliente_nome',
                'clientes.cpf as cliente_cpf',
                'clientes.email as cliente_email',
                'livros.nome as livro_nome',
                'livros.autor as livro_autor',
                'livros.identificador as livro_identificador')
            ->where('emprestimos.ativo', true)
            ->get();
        
        return response()->json($emprestimos, 200);
    }
    
    public function store(EmprestimoRequest $request){
        
        if(!DB::table('livros')->where('id', $request->id_livro)->select('emprestado'))
            return response()->json(['message' => 'Este livro já está emprestado.'],401);

        $emprestimo = new Emprestimo();
        $emprestimo->fill($request->all());
        $emprestimo->save();

        DB::table('livros')->where('id', $request->id_livro)
        ->update(['emprestado' => true]);
        
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

    public function update(EmprestimoRequest $request, $id){
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

        DB::table('livros')->where('id', $id)
        ->update(['emprestado' => false]);

        Emprestimo::where('id', $id)->update(['ativo' => false]);
        return response()->json(['message'=>'Registro deletado com sucesso'],200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
