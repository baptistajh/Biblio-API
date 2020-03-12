<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json($users, 200);
    }
    public function store(Request $request){
        $user = new User();
        $user->fill($request->all());
        if (!empty($user->password)) {
            $user->password =bcrypt($user->password);
        }
        $user->save();

        return response()->json($user, 201);
    }
    public function create(){

    }
    public function show($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Record not found'],404);
        }
        return response()->json($user);
    }
    public function update(){
        
    }
    public function destroy(){

    }
    public function edit(){

    }

}
