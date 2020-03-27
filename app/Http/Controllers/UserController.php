<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function index(){
        $users = User::query()
        ->orderBy('id')
        ->get();

        return response()->json($users, 200);
    }
    public function store(Request $request){

        //Usar para validar a requisição
        // $validatedData = $request->validate([
        //     'cpf'   => 'required|unique:users|max:15',
        //     'email' => 'required|unique:users|max:155|email',
        //     'rg'    => 'required|unique:users',
        // ]);

        $user = new User();
        $user->fill($request->all());
        if (!empty($user->password)) {
            $user->password =bcrypt($user->password);
        }
        $user->save();

        return response()->json($user, 201);
    }
    
    public function create(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
    
    public function show($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        return response()->json($user);
    }

    public function update(Request $request, $id){
        if(!User::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        User::where('id', $id)->update($request->all());
        return response()->json(['message'=>'Registro alterado com sucesso'], 200);
    }

    public function destroy($id){
        if(!User::where('id',$id)->exists()){
            return response()->json(['message'=>'Registro não encontrado'],404);
        }
        User::where('id',$id)->delete();
        return response()->json(['message'=>'Registro deletado com sucesso'], 200);
    }

    public function edit(){
        return response()->json(['message'=>'Nada para realizar nesta rota.']);
    }
}
