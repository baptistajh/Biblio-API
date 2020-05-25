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
    
    public $timestamps = false;
}
