<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api' ], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['middleware' => 'jwt.verify'], function(){
    route::resource('user', 'UserController');
    route::resource('livro', 'LivroController');
    route::resource('estante', 'EstanteController');
    route::resource('cliente', 'ClienteController');
    route::resource('prateleira', 'PrateleiraController');
    route::resource('corredor', 'CorredorController');
    route::resource('emprestimo', 'EmprestimoController');

    //ROTAS PERSONALIZADAS
    route::get('/home', 'HomeController@index');
});