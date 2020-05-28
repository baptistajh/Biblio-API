<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dia_emprestimo', 'dia_devolucao', 'id_cliente', 'id_livro', 'ativo'
    ];

    /**
     * The storage table of the model.
     *
     * @var string
     */
    protected $table = 'emprestimos';
    
    public $timestamps = false;
}