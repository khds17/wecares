<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Prestador extends FormRequest
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
            'prestadorCPF'=>'bail|required|cpf|unique:PRESTADORES,CPF',
            'prestadorTelefone'=>'required',
            'prestadorNascimento'=>'bail|required|date',
            'prestadorEmail'=>'bail|required|email:rfc,dns|unique:PRESTADORES,EMAIL',
            'prestadorSenha'=>'required:min:5',
            'prestadorConfirmarSenha'=>'required|same:prestadorSenha',
            'prestadorCep'=>'bail|required|min:8|max:8',
            'prestadorEndereco'=>'required',
            'prestadorNumero'=>'bail|required|numeric',
            'prestadorCidade'=>'required',
            'prestadorBairro'=>'required',
            'prestadorEstado'=>'required',
            'formacao'=>'required',
            'certificadoFormacao'=>'bail|required|mimes:jpeg,png,pdf',
            'antecedentes'=>'bail|required|mimes:jpeg,png,pdf',
            'foto'=>'bail|required|mimes:jpeg,png',
            'termos'=>'required'
        ];
    }
    //Mensagens personalizadas de retorno
    public function messages()
    {
        return[
            'prestadorNome.required'=>'Nome é um campo obrigatório',
            'prestadorNome.min'=>'Preencha o nome completo',
            'prestadorCPF.required'=>'CPF é um campo obrigatório',
            'prestadorCPF.unique'=>'CPF já cadastrado. Caso seja o dono deste CPF, entre em contato conosco!',
            'prestadorCPF.cpf'=>'CPF inválido',
            'prestadorTelefone.required'=>'Telefone é um campo obrigatório',
            'prestadorNascimento.required'=>'Data de nascimento é um campo obrigatório',
            'prestadorNascimento.date'=>'Data inválida',
            'sexo.required'=>'Sexo é um campo obrigatório',
            'prestadorEmail.required'=>'E-mail é um campo obrigatório',
            'prestadorEmail.email'=>'E-mail inválido',
            'prestadorEmail.unique'=>'E-mail já cadastrado. Caso seja o dono deste e-mail, entre em contato conosco!',
            'prestadorSenha.required'=>'Senha é um campo obrigatório',
            'prestadorSenha.min'=>'Digite uma senha de no mínimo 5 digitos',
            'prestadorConfirmarSenha.required'=>'Confirme a senha é um campo obrigatório',
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
            'foto.required'=>'A foto  de perfil é obrigatória',
            'foto.mimes'=>'Só são aceitos arquivos JPEG, JPG ou PNG',
            'termos.required'=>'Termos e aceite são obrigatórios'

        ];
    }
}
