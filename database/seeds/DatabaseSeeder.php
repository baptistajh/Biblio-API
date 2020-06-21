<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Biblio Teste', 
            'cpf'=>'111.111.111-11',
            'rg'=>'111111111',
            'data_nascimento'=>'1999-06-15',
            'endereco'=>'Rua 9 de Julho, Casa '.str_random(1).' - Centro - Guariba/SP',
            'email'=>'teste@teste.com',
            'password'=>bcrypt('secret'),
            'ativo'=>true,
        ]);
        /*DB::table('clientes')->insert([
            'nome'     => 'José Henrique Baptista Junior',
            'telefone' => '',
            'cpf'      => '',
            'email'    => '',
            'endereco' => '',
            'ativo'    => true,
        ])*/
    }
}
