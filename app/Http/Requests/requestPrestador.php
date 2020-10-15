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
            'prestadorNome'=>'bail|required|min:3|max:100',
            'prestadorCPF'=>'bail|required|min:9|max:9|unique:PRESTADORES,CPF',
            'prestadorNumero'=>'required',
            'prestadorNascimento'=>'bail|required|date',
            'sexo'=>'required',
            'prestadorEmail'=>'bail|required|email:rfc,dns|unique:PRESTADORES,EMAIL',
            'prestadorSenha'=>'required:min:8',
            'prestadorConfirmarSenha'=>'required|min:8|same:prestadorSenha',
            'prestadorCep'=>'bail|required|min:8|max:9',
            'prestadorEndereco'=>'required',
            'prestadorNumero'=>'bail|required|numeric',
            'prestadorCidade'=>'required',
            'prestadorBairro'=>'required',
            'prestadorEstado'=>'required',
            'formacao'=>'required',
            'certificadoFormacao'=>'bail|required|mimes:jpeg,png,pdf',
            'antecedentes'=>'bail|required|mimes:jpeg,png,pdf',
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
