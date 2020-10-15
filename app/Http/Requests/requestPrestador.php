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
            'prestadorCep'=>'bail|required|min:8|max:8',
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
    public function messages()
    {
        return[
            'prestadorNome.required'=>'Nome é um campo obrigatório',
            'prestadorNome.mix'=>'Preencha o nome completo',
            'prestadorCPF.required'=>'CPF é um campo obrigatório',
            'prestadorCPF.unique'=>'CPF já cadastrado. Caso seja o dono deste CPF, entre em contato conosco!',
            'prestadorCPF.min'=>'CPF inválido',
            'prestadorCPF.max'=>'CPF inválido',
            'prestadorNascimento.required'=>'Data de nascimento é um campo obrigatório',
            'prestadorNascimento.date'=>'Data inválida',
            'sexo.required'=>'Sexo é um campo obrigatório',
            'prestadorEmail.required'=>'E-mail é um campo obrigatório',
            'prestadorEmail.email'=>'E-mail inválido',
            'prestadorEmail.unique'=>'E-mail já cadastrado. Caseo seja o dono deste e-mail, entre em contato conosco!',
            'prestadorSenha.required'=>'Senha é um campo obrigatório',
            'prestadorSenha.min'=>'Digite uma senha de no mínimo 8 digitos',
            'prestadorConfirmarSenha.required'=>'Confirme a senha é um campo obrigatório',
            'prestadorConfirmarSenha.min'=>'Digite uma senha de no mínimo 8 digitos',
            'prestadorConfirmarSenha.same'=>'As senhas são diferentes',
            'prestadorCep.required'=>'CEP é um campo obrigatório',
            'prestadorCep.min'=>'CEP inválido',
            'prestadorCep.max'=>'CEP inválido',
            'prestadorEndereco.required'=>'Endereço é um campo obrigatório',
            'prestadorNumero.required'=>'Número é um campo obrigatório',
            'prestadorNumero.numeric'=>'Número só aceita valores númericos',
            'prestadorCidade.required'=>'Cidade é um campo obrigatório',
            'prestadorBairro.required'=>'Bairro é um campo obrigatório',
            'prestadorEstado.required'=>'Estado é um campo obrigatório',
            'formacao.required'=>'Formação é um campo obrigatório',
            'certificadoFormacao.required'=>'Certificado é um documento obrigatório',
            'certificadoFormacao.mimes'=>'Só são aceitos arquivos JPEG, PNG ou PDF',
            'antecedentes.required'=>'Antecedentes é um documento obrigatório',
            'antecedentes.mimes'=>'Só são aceitos arquivos JPEG, PNG ou PDF',
            'termos.required'=>'Termos e aceite são obrigatórios'

        ];
    }
}
