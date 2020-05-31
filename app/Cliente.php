<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','telefone','cpf','email','endereco','ativo'
    ];
    
    /**
     * The storage table of the model.
     *
     * @var string
     */
    protected $table = 'clientes';

    public $timestamps = false;
}
