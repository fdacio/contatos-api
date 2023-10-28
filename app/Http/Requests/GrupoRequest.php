<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = request()->get('id');

        return 
        [
            'nome' => "required|max:100|unique:grupos,nome,{$id}",
        ];

    }
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [            
            'nome.required' => 'Informe o nome',
            'nome.unique' => 'Grupo já cadastrado'
        ];
    }
}
