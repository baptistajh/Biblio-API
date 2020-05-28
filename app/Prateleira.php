<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prateleira extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero', 'id_estante', 'ativo'
    ];

    /**
     * The storage table of the model.
     *
     * @var string
     */
    protected $table = 'prateleiras';
    
    public $timestamps = false;
}
