<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'title', 'ingrediente',
    ];
    /*
    protected $casts = [
        'ingrediente' => 'array',
    ];
    */
}
