<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'title', 'descripcion','ingrediente','paso','categoria'
    ];
    /*
    protected $casts = [
        'ingrediente' => 'array',
    ];
    */
}
