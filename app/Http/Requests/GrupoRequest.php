<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = request()->get('id');

        return
            [
                'nome' => "required|max:100|unique:grupos,nome,{$id}",
            ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe o nome',
            'nome.unique' => 'Grupo já cadastrado'
        ];
    }

}
