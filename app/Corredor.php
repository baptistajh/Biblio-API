<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corredor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'letra', 'ativo'
    ];

    protected $table = 'corredores';
    
    public $timestamps = false;
}
