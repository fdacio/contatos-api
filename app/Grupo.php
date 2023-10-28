<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'gruposs';

    protected $fillable = ['nome'];
}
