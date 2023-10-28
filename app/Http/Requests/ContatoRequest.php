<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
        $id = request()->route();
        dd($id);
        return 
        [
            'nome' => 'required|max:60',
            'email' => "required|max:100|email|unique:contatos,email,{$id}",
            'telefone' => 'required',
            'id_grupo' => 'required|numeric'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return             [
            'nome.required' => 'Informe o Nome',
            'email.required' => 'Informe o Email',
            'email.email' => 'Email Inválido',
            'email.unique' => 'Email já cadastrado',
            'telefone.required' => 'Informe o Telefone',
            'id_grupo.required' => 'Informe o Grupo',
            'id_grupo.numeric' => 'Grupo inválido'
        ];
    }
}
