<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestSolicitantePaciente extends FormRequest
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
            'solicitanteNome'=>'bail|required|min:3|max:100',
            'solicitanteCPF'=>'bail|required|cpf|unique:SOLICITANTES,CPF',
            'solicitanteEmail'=>'bail|required|email:rfc,dns|unique:SOLICITANTES,EMAIL',
            'solicitanteTelefone'=>'required',
            'solicitanteSenha'=>'required:min:5',
            'solicitanteConfirmarSenha'=>'required|min:8|same:solicitanteSenha',
            'solicitanteCep'=>'bail|required|min:8|max:8',
            'solicitanteEndereco'=>'required',
            'solicitanteNumero'=>'bail|required|numeric',
            'solicitanteCidade'=>'required',
            'solicitanteBairro'=>'required',
            'solicitanteEstado'=>'required',
            'familiaridade'=>'required',
            'pacienteNome'=>'bail|required|min:3|max:100',
            'pacienteTipo'=>'required',
            'pacienteLocalizacao'=>'required',
            'pacienteCep'=>'bail|required|min:8|max:8',
            'pacienteEndereco'=>'required',
            'pacienteNumero'=>'bail|required|numeric',
            'pacienteCidade'=>'required',
            'pacienteBairro'=>'required',
            'pacienteEstado'=>'required',
            'tomaMedicamento'=>'required',
        ];
    }

    //Mensagens personalizadas de retorno
    public function messages()
    {
        return[
            'solicitanteNome.required'=>'Nome é um campo obrigatório',
            'solicitanteNome.mix'=>'Preencha o nome completo',
            'solicitanteCPF.required'=>'CPF é um campo obrigatório',
            'solicitanteCPF.unique'=>'CPF já cadastrado. Caso seja o dono deste CPF, entre em contato conosco!',
            'solicitanteCPF.cpf'=>'CPF inválido',
            'solicitanteNascimento.required'=>'Data de nascimento é um campo obrigatório',
            'solicitanteNascimento.date'=>'Data inválida',
            'solicitanteEmail.required'=>'E-mail é um campo obrigatório',
            'solicitanteEmail.email'=>'E-mail inválido',
            'solicitanteEmail.unique'=>'E-mail já cadastrado. Caseo seja o dono deste e-mail, entre em contato conosco!',
            'solicitanteTelefone.required'=>'Telefone é um campo obrigatório',
            'solicitanteSenha.required'=>'Senha é um campo obrigatório',
            'solicitanteSenha.min'=>'Digite uma senha de no mínimo 5 digitos',
            'solicitanteConfirmarSenha.required'=>'Confirme a senha é um campo obrigatório',
            'solicitanteConfirmarSenha.min'=>'Digite uma senha de no mínimo 8 digitos',
            'solicitanteConfirmarSenha.same'=>'As senhas são diferentes',
            'solicitanteCep.required'=>'CEP é um campo obrigatório',
            'solicitanteCep.min'=>'CEP inválido',
            'solicitanteCep.max'=>'CEP inválido',
            'solicitanteEndereco.required'=>'Endereço é um campo obrigatório',
            'solicitanteNumero.required'=>'Número é um campo obrigatório',
            'solicitanteNumero.numeric'=>'Número só aceita valores númericos',
            'solicitanteCidade.required'=>'Cidade é um campo obrigatório',
            'solicitanteBairro.required'=>'Bairro é um campo obrigatório',
            'solicitanteEstado.required'=>'Estado é um campo obrigatório',
            'familiaridade.required'=>'Nível de familiaridade é um campo obrigatório',
            'pacienteNome.required'=>'Nome é um campo obrigatório',
            'pacienteNome.mix'=>'Preencha o nome completo',
            'pacienteNome.required'=>'Nome é um campo obrigatório',
            'pacienteTipo.required'=>'A fase da vida do paciente é um campo obrigatório',
            'pacienteLocalizacao.required'=>'Localização é um campo obrigatório',
            'pacienteCep.required'=>'CEP é um campo obrigatório',
            'pacienteCep.min'=>'CEP inválido',
            'pacienteCep.max'=>'CEP inválido',
            'pacienteEndereco.required'=>'Endereço é um campo obrigatório',
            'pacienteNumero.required'=>'Número é um campo obrigatório',
            'pacienteNumero.numeric'=>'Número só aceita valores númericos',
            'pacienteCidade.required'=>'Cidade é um campo obrigatório',
            'pacienteBairro.required'=>'Bairro é um campo obrigatório',
            'pacienteEstado.required'=>'Estado é um campo obrigatório',
            'tomaMedicamento.required'=>'Medicamentos é um campo obrigatório',


        ];
    }
}
