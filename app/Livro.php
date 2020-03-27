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
        'nome','autor','edicao','local','editora','ano','identificador'
    ];
    
    public $timestamps = false;
}
