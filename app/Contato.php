<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';

    protected $fillable = ['nome', 'email', 'telefone', 'id_grupo'];


    public function grupo()
    {
        return $this->hasOne(Grupo::class, 'id', 'id_grupo');
    }
}

