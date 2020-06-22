<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Livros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('autor');
            $table->integer('edicao');
            $table->string('local');
            $table->string('editora');
            $table->integer('ano');
            $table->integer('id_corredor')->references('id')->on('corredores');
            $table->integer('id_estante')->references('id')->on('estantes');
            $table->integer('id_prateleira')->references('id')->on('prateleiras');
            $table->boolean('emprestado')->default(false);
            $table->boolean('ativo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
