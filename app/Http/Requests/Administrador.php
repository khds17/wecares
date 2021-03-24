<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Administrador extends FormRequest
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
        return [
            'adminNome'=>'bail|required|min:3|max:100',
            'adminCPF'=>'bail|required|cpf|unique:ADMINISTRADORES,CPF',
            'adminEmail'=>'bail|required|email:rfc,dns|unique:ADMINISTRADORES,EMAIL',
            'adminTelefone'=>'required',
            'adminSenha'=>'required:min:8',
            'adminConfirmarSenha'=>'required|min:8|same:adminSenha',
            'adminCep'=>'bail|required|min:8|max:8',
            'adminEndereco'=>'required',
            'adminNumero'=>'bail|required|numeric',
            'adminCidade'=>'required',
            'adminBairro'=>'required',
            'adminEstado'=>'required',
        ];
    }

      //Mensagens personalizadas de retorno
      public function messages()
      {
          return[
              'adminNome.required'=>'Nome é um campo obrigatório',
              'adminNome.mix'=>'Preencha o nome completo',
              'adminCPF.required'=>'CPF é um campo obrigatório',
              'adminCPF.unique'=>'CPF já cadastrado. Caso seja o dono deste CPF, entre em contato conosco!',
              'adminCPF.cpf'=>'CPF inválido',
              'adminNascimento.required'=>'Data de nascimento é um campo obrigatório',
              'adminNascimento.date'=>'Data inválida',
              'adminEmail.required'=>'E-mail é um campo obrigatório',
              'adminEmail.email'=>'E-mail inválido',
              'adminEmail.unique'=>'E-mail já cadastrado. Caseo seja o dono deste e-mail, entre em contato conosco!',
              'adminTelefone.required'=>'Telefone é um campo obrigatório',
              'adminSenha.required'=>'Senha é um campo obrigatório',
              'adminSenha.min'=>'Digite uma senha de no mínimo 8 digitos',
              'adminConfirmarSenha.required'=>'Confirme a senha é um campo obrigatório',
              'adminConfirmarSenha.min'=>'Digite uma senha de no mínimo 8 digitos',
              'adminConfirmarSenha.same'=>'As senhas são diferentes',
              'adminCep.required'=>'CEP é um campo obrigatório',
              'adminCep.min'=>'CEP inválido',
              'adminCep.max'=>'CEP inválido',
              'adminEndereco.required'=>'Endereço é um campo obrigatório',
              'adminNumero.required'=>'Número é um campo obrigatório',
              'adminNumero.numeric'=>'Número só aceita valores númericos',
              'adminCidade.required'=>'Cidade é um campo obrigatório',
              'adminBairro.required'=>'Bairro é um campo obrigatório',
              'adminEstado.required'=>'Estado é um campo obrigatório',
          ];
      }
}
