<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';

    protected $fillable = ['nome', 'email', 'telefone', 'id_grupo', 'grupo'];


    public function grupo()
    {
        $this->hasOne('App\Grupo', 'id_grupo', 'id');
    }
}

