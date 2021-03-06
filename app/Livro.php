<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','autor','edicao','local','editora','ano', 'id_corredor', 'id_estante', 'id_prateleira', 'ativo'
    ];
    
    /**
     * The storage table of the model.
     *
     * @var string
     */
    protected $table = 'livros';

    public $timestamps = false;
}
