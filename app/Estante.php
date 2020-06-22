<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estante extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero','ativo'
    ];

    /**
     * The storage table of the model.
     *
     * @var string
     */
    protected $table = 'estantes';
    
    public $timestamps = false;
}
