<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestPrestador extends FormRequest
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
    //Regras de validação dos campos do formulario
    public function rules()
    {
        return [
            'prestadorNome'=>'required',
            'prestadorCPF'=>'required|min:9|max:9',
            'prestadorNumero'=>'required',
            'prestadorNascimento'=>'required',
            'sexo'=>'required',
            'prestadorEmail'=>'required',
            'prestadorSenha'=>'required',
            'prestadorCep'=>'required',
            'prestadorEndereco'=>'required',
            'prestadorNumero'=>'required',
            'prestadorCidade'=>'required',
            'prestadorBairro'=>'required',
            'prestadorEstado'=>'required',
            'prestadorComplemento'=>'required',
            'formacao'=>'required',
            'certificadoFormacao'=>'required',
            'antecedentes'=>'required',
            'termos'=>'required'
        ];
    }
    //Mensagens personalizadas de retorno
    // public function messages()
    // {
    //     return[
    //         'prestadorNome.required'=>'Nome é obrigatório',
    //     ];
    // }
}
