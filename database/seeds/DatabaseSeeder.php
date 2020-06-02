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
            //"nome"=> "Sistemas Integrados de Gestão ERP, uma abordagem gerencial",
            //"autor"=> "Cícero Caiçara Junior",
            //"edicao"=> "4ª Edição",
            //"local"=> "Guariba/PR",
            //"editora"=> "Editora IBPEX Dialogica",
            //"ano"=> "2016",
            //"identificador"=>"621-L258"
            


            'name'=>str_random(20), 
            'cpf'=>str_random(11),
            'rg'=>str_random(9),
            'data_nascimento'=>'1999-06-15',
            'endereco'=>'Rua 9 de Julho, Casa '.str_random(1).' - Centro - Guariba/SP',
            'email'=>'teste@teste.com',
            'password'=>bcrypt('secret'),
            'ativo'=>true,
        ]);
    }
}
