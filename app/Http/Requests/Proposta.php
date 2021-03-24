<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Proposta extends FormRequest
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
            'selectPaciente' => 'bail|required',
            'pacienteTipo' => 'bail|required',
            'familiaridade' => 'bail|required',
            'pacienteLocalizacao' => 'bail|required',
            'pacienteCep' => 'bail|required',
            'pacienteEndereco' => 'bail|required',
            'pacienteCidade' => 'bail|required',
            'pacienteBairro' => 'bail|required',
            'pacienteEstado' => 'bail|required',
            'pacienteNumero' => 'bail|required',
            'tomaMedicamento' => 'bail|required',
            'dataInicio' => 'bail|required',
            'dataFim' => 'bail|required',
            'horaInicio' => 'bail|required',
            'horaFim' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'selectPaciente.required' => 'Paciente é um campo obrigatório',
            'pacienteTipo.required' => 'O tipo do paciente é é um campo obrigatório',
            'familiaridade.required' => 'A familiaridde é obrigatória',
            'pacienteLocalizacao.required' => 'A localização do paciete é um campo obrigatório',
            'pacienteCep.required' => 'CEP é um campo obrigatório',
            'pacienteEndereco.required' => 'Endereço é um campo obrigatório',
            'pacienteCidade.required' => 'Cidade é um campo obrigatório',
            'pacienteBairro.required' => 'Bairro é um campo obrigatório',
            'pacienteEstado.required' => 'Estado é um campo obrigatório',
            'pacienteNumero.required' => 'Número é um campo obrigatório',
            'tomaMedicamento.required' => 'Este campo é obrigatório',
            'dataInicio.required' => 'Data de inicio é um campo obrigatório',
            'dataFim.required' => 'Data fim é um campo obrigatório',
            'horaInicio.required' => 'Hora de inicio é um campo obrigatório',
            'horaFim.required' => 'Hora fim é um campo obrigatório',
        ];
    }
}
