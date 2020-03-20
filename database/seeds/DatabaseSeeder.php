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
        DB::table('livros')->insert([
            'nome'=>str_random(10),
            'autor'=>str_random(10),
            'edicao'=>str_random(10),
            'local'=>str_random(10),
            'editora'=>str_random(10),
            'ano'=>str_random(10)
            


            /*'name'=>str_random(20), 
            'cpf'=>str_random(11),
            'rg'=>str_random(9),
            'data_nascimento'=>'1999-06-15',
            'endereco'=>'Rua 9 de Julho, Casa '.str_random(1).' - Centro - Guariba/SP',
            'email'=>str_random(10).'@teste.com',
            'password'=>bcrypt('secret'),*/
        ]);
    }
}
