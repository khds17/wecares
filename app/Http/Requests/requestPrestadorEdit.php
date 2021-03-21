<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCaregiversEdit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'prestadorNome'=>'bail|required|min:3|max:100',
            'prestadorCPF'=>'bail|required|cpf|unique:PRESTADORES,CPF',
            'prestadorTelefone'=>'required',
            'prestadorNascimento'=>'bail|required|date',
            'prestadorEmail'=>'bail|required|email:rfc,dns|unique:users,EMAIL',
            'prestadorCep'=>'bail|required|min:8|max:8',
            'prestadorEndereco'=>'required',
            'prestadorNumero'=>'bail|required|numeric',
            'prestadorCidade'=>'required',
            'prestadorBairro'=>'required',
            'prestadorEstado'=>'required',
            'formacao'=>'required',
            // 'certificadoFormacao'=>'bail|mimes:jpeg,png,pdf',
            // 'antecedentes'=>'bail|mimes:jpeg,png,pdf',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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
            // 'certificadoFormacao.required'=>'Certificado é um documento obrigatório',
            // 'certificadoFormacao.mimes'=>'Só são aceitos arquivos JPEG, PNG ou PDF',
            // 'antecedentes.required'=>'Antecedentes é um documento obrigatório',
            // 'antecedentes.mimes'=>'Só são aceitos arquivos JPEG, PNG ou PDF',
        ];
    }
}
