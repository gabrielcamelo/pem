<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lids extends Model
{
    protected $fillable = [
        'name', 'email', 'telefone'
    ];
}
