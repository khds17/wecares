<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propostas;
use App\Models\solicitantes;
use App\Models\paciente_tipo;
use App\Models\pacientes;
use App\Models\prestadores;
use App\Models\cidades;
use App\Models\servicos;
use App\Models\servicos_prestados;
use App\Models\paciente_localizacao;
use App\Models\familiaridade;
use App\Models\registros_log;
use App\Http\Requests\Proposta;
use App\Config\constants;
use Illuminate\Support\Facades\DB;

class ServicosController extends Controller
{
    //Instanciando as classes
    public function __construct()
    {
        $this->objProposta = new Propostas();
        $this->objPrestador = new prestadores();
        $this->objSolicitante = new solicitantes();
        $this->objPaciente = new pacientes();
        $this->objPacienteTipo = new paciente_tipo();
        $this->objCidades = new cidades();
        $this->objPacienteLocalizacao = new paciente_localizacao();
        $this->objServicosPrestados = new servicos_prestados();
        $this->objServico = new servicos();
        $this->objFamiliaridades = new familiaridade();
        $this->objRegistros = new registros_log();

    }

    public function proposta(Proposta $request)
    {
        // Todos os select estão em um array dentro de um array, para isso, criei um foreach para remover todos do array
        $arraySolicitantes = $this->objSolicitante
                            ->where('ID_USUARIO', auth()->user()->id)
                            ->get();

        foreach ($arraySolicitantes as $arraySolicitante) {
            $solicitante = $arraySolicitante;
        }

        $arrayPacientes = $this->objPaciente
                            ->where('PACIENTES.ID', '=', $request->selectPaciente)
                            ->get();

        foreach ($arrayPacientes as $arrayPaciente) {
            $paciente = $arrayPaciente;
        }

        $arrayPacientesTipos = $this->objPacienteTipo
                                ->join('PACIENTES', 'PACIENTES_TIPOS.ID', '=', 'PACIENTES.ID_TIPO')
                                ->where('PACIENTES_TIPOS.ID', '=', $paciente->ID_TIPO)
                                ->select('PACIENTES_TIPOS.*')
                                ->get();

        foreach ($arrayPacientesTipos as $arrayPacienteTipos) {
            $pacienteTipo = $arrayPacienteTipos;
        }

        $arrayPacientesLocalizacao = $this->objPacienteLocalizacao
                                        ->join('PACIENTES', 'PACIENTE_LOCALIZACAO.ID', '=', 'PACIENTES.ID_LOCALIZACAO')
                                        ->where('PACIENTE_LOCALIZACAO.ID', '=', $paciente->ID_LOCALIZACAO)
                                        ->select('PACIENTE_LOCALIZACAO.*')
                                        ->get();

        foreach ($arrayPacientesLocalizacao as $arrayPacienteLocalizacao) {
            $pacienteLocalizacao = $arrayPacienteLocalizacao;
        }

        $arrayCidades = $this->objCidades
                        ->where('CIDADES.ID','=', $request->pacienteCidade)
                        ->get();


        foreach ($arrayCidades as $arrayCidade) {
            $cidade = $arrayCidade;
        }

        DB::beginTransaction();

            try {
                $idPrestadores = explode(",",$request->idPrestadores);

                $idServicos = implode(",",$request->servicos);

                foreach ($idPrestadores as $idPrestador) {

                    $arrayPrestadores = $this->objPrestador
                                            ->where('PRESTADORES.ID', '=', $idPrestador)
                                            ->get();

                    foreach ($arrayPrestadores as $arrayPrestador) {
                        $prestador = $arrayPrestador;

                        $this->objProposta->create([
                            'ID_PRESTADOR' => $prestador->ID,
                            'NOME_PRESTADOR' =>$prestador->NOME,
                            'ID_SOLICITANTE' => $solicitante->ID,
                            'NOME_SOLICITANTE' => $solicitante->NOME,
                            'ID_FAMILIARIDADE' => $request->familiaridade,
                            'OUTROS_FAMILIARIDADE' => $request->familiaridadeOutros,
                            'ID_PACIENTE' => $paciente->ID,
                            'NOME_PACIENTE' => $paciente->NOME,
                            'TIPO' => $pacienteTipo->TIPO,
                            'LOCALIZACAO' => $pacienteLocalizacao->LOCALIZACAO,
                            'CEP' => $request->pacienteCep,
                            'ENDERECO' => $request->pacienteEndereco,
                            'NUMERO' => $request->pacienteNumero,
                            'COMPLEMENTO' => $request->pacienteComplemento,
                            'BAIRRO' => $request->pacienteBairro,
                            'CIDADE' => $cidade->CIDADE,
                            'UF' => $cidade->UF,
                            'SERVICOS' => $idServicos,
                            'SERVICOS_OUTROS' => $request->servicoOutros,
                            'TOMA_MEDICAMENTOS' => $request->tomaMedicamento,
                            'TIPO_MEDICAMENTOS' => $request->tipoMedicamento,
                            'DATA_SERVICO' => $request->dataServico,
                            'HORA_INICIO' => $request->horaInicio,
                            'HORA_FIM' => $request->horaFim,
                            'VALOR' => $request->precoServico
                        ]);

                        $this->objRegistros->create([
                            'DATA' => date('d/m/Y \à\s H:i:s'),
                            'TEXTO' => 'Proposta feita pelo solicitante '.$solicitante->NOME.' foi enviada com sucesso',
                            'ID_USUARIO' => auth()->user()->id
                        ]);
                    }

                    DB::commit();

                    return redirect()->action('ServicosController@propostaAgradecimento');
                }
            } catch (\Throwable $th) {
                DB::rollback();
                return redirect()->action('ServicosController@propostas');
            }
    }

    public function propostaAgradecimento()
    {
        return view('servicos/propostaAgradecimento');
    }

    public function selectProposta($id)
    {
        $propostas = $this->objProposta->find($id);

        $prestador = $this->objPrestador
                            ->join('FORMACAO','PRESTADORES.ID_FORMACAO','=','FORMACAO.ID')
                            ->where('PRESTADORES.ID','=',$propostas->ID_PRESTADOR)
                            ->select('PRESTADORES.TELEFONE','FORMACAO.FORMACAO')
                            ->get();

        $dadosProposta = [
            'propostas' => $propostas,
            'prestador' => $prestador,
        ];

        return $dadosProposta;
    }

    public function servicosPrestados()
    {
        $servicosPrestados = $this->objServicosPrestados
                                ->join('SOLICITANTES','SERVICOS_PRESTADOS.ID_SOLICITANTE','=','SOLICITANTES.ID')
                                ->join('PRESTADORES','SERVICOS_PRESTADOS.ID_PRESTADOR','=','PRESTADORES.ID')
                                ->join('FORMACAO','PRESTADORES.ID_FORMACAO','=','FORMACAO.ID')
                                ->leftJoin('PAGAMENTOS','SERVICOS_PRESTADOS.ID','=','PAGAMENTOS.ID_SERVICO_PRESTADO')
                                ->where('PRESTADORES.ID_USUARIO', auth()->user()->id)
                                ->select('SERVICOS_PRESTADOS.*','PRESTADORES.TELEFONE','FORMACAO.FORMACAO', 'PAGAMENTOS.ID_PAGAMENTO')
                                ->get();

        $servicos = $this->objServico->all();

        $familiaridades = $this->objFamiliaridades->all();

        return view('servicos/servicosPrestados', compact('servicosPrestados','servicos','familiaridades'));
    }


    public function servicosContratados()
    {
        $servicosContratados = $this->objServicosPrestados
                                ->join('SOLICITANTES','SERVICOS_PRESTADOS.ID_SOLICITANTE','=','SOLICITANTES.ID')
                                ->join('PRESTADORES','SERVICOS_PRESTADOS.ID_PRESTADOR','=','PRESTADORES.ID')
                                ->join('FORMACAO','PRESTADORES.ID_FORMACAO','=','FORMACAO.ID')
                                ->leftJoin('PAGAMENTOS','SERVICOS_PRESTADOS.ID','=','PAGAMENTOS.ID_SERVICO_PRESTADO')
                                ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
                                ->select('SERVICOS_PRESTADOS.*','PRESTADORES.TELEFONE','FORMACAO.FORMACAO', 'PAGAMENTOS.ID_PAGAMENTO')
                                ->get();

        $servicos=$this->objServico->all();

        return view('servicos/servicosContratados', compact('servicosContratados','servicos'));
    }

    public function criarServicos()
    {
        // Constant para validar os servicos que foram aceitados por prestadores e solicitantes
        $propostaAceita = \Config::get('constants.SERVICOS.ACEITADO');

        // Constant para incluir o serviço como pendente antes de ser prestado e transacionado no meio de pagamento
        $servicoPendente = \Config::get('constants.SERVICOS.PENDENTE');

        // Select para pegar todas as propostas que ainda não foram criadas como serviços a serem prestados
        $servicos = $this->objProposta
                        ->leftJoin('SERVICOS_PRESTADOS', 'SERVICOS_PRESTADOS.ID_PROPOSTA', '=', 'PROPOSTAS.ID')
                        ->where('PROPOSTAS.APROVACAO_SOLICITANTE', '=', $propostaAceita)
                        ->where('PROPOSTAS.APROVACAO_PRESTADOR', '=', $propostaAceita)
                        ->whereNull('SERVICOS_PRESTADOS.ID_PROPOSTA')
                        ->select('PROPOSTAS.*')
                        ->get();

        // Percorre o select e cria o serviço a ser prestado para todas as propostas que não possuem essa serviço.
        try {
            DB::beginTransaction();
            if(count($servicos) >= 1) {
                foreach ($servicos as $servico) {
                    $this->objServicosPrestados->create([
                        'ID_PROPOSTA' => $servico->ID,
                        'ID_PRESTADOR' => $servico->ID_PRESTADOR,
                        'NOME_PRESTADOR' => $servico->NOME_PRESTADOR,
                        'ID_SOLICITANTE' => $servico->ID_SOLICITANTE,
                        'NOME_SOLICITANTE' => $servico->NOME_SOLICITANTE,
                        'ID_FAMILIARIDADE' => $servico->ID_FAMILIARIDADE,
                        'OUTROS_FAMILIARIDADE' => $servico->OUTROS_FAMILIARIDADE,
                        'ID_PACIENTE' => $servico->ID_PACIENTE,
                        'NOME_PACIENTE' => $servico->NOME_PACIENTE,
                        'TIPO' => $servico->TIPO,
                        'LOCALIZACAO' => $servico->LOCALIZACAO,
                        'CEP' => $servico->CEP,
                        'ENDERECO' => $servico->ENDERECO,
                        'NUMERO' => $servico->NUMERO,
                        'COMPLEMENTO' => $servico->COMPLEMENTO,
                        'BAIRRO' => $servico->BAIRRO,
                        'CIDADE' => $servico->CIDADE,
                        'UF' => $servico->UF,
                        'SERVICOS' => $servico->SERVICOS,
                        'SERVICOS_OUTROS' => $servico->SERVICOS_OUTROS,
                        'TOMA_MEDICAMENTOS' => $servico->TOMA_MEDICAMENTOS,
                        'TIPO_MEDICAMENTOS' => $servico->TIPO_MEDICAMENTOS,
                        'DATA_SERVICO' => $servico->DATA_SERVICO,
                        'HORA_INICIO' => $servico->HORA_INICIO,
                        'HORA_FIM' => $servico->HORA_FIM,
                        'VALOR' => $servico->VALOR,
                        'STATUS_SERVICO' => $servicoPendente
                    ]);

                    DB::commit();
                    echo "Serviço criado com sucesso";
                }
            } else {
                echo "Não há serviços para serem criados";
            }
        } catch (\Throwable $th) {
            DB::rollback();
            echo "Erro ao criar serviço";
        }
    }

    public function aceitarProspostaPrestador($id)
    {

        $this->objProposta->where(['ID'=>$id])->update([
            'APROVACAO_PRESTADOR' => \Config::get('constants.SERVICOS.ACEITADO')
        ]);

        $proposta = $this->objProposta->find($id);

        $this->objRegistros->create([
            'DATA' => date('d/m/Y \à\s H:i:s'),
            'TEXTO' => 'Proposta#'.$proposta->ID.' do solicitante '.$proposta->NOME_SOLICITANTE.' aceita',
            'ID_USUARIO' => auth()->user()->id
        ]);

        return true;

    }

    public function recusarProspostaPrestador($id)
    {
        $this->objProposta->where(['ID'=>$id])->update([
            'APROVACAO_PRESTADOR' => \Config::get('constants.SERVICOS.RECUSADO'),
        ]);

        $proposta = $this->objProposta->find($id);

        $this->objRegistros->create([
            'DATA' => date('d/m/Y \à\s H:i:s'),
            'TEXTO' => 'Proposta#'.$proposta->ID.' do solicitante '.$proposta->NOME_SOLICITANTE.' recusada',
            'ID_USUARIO' => auth()->user()->id
        ]);

        return true;
    }

    public function aceitarPropostaSolicitante($id)
    {
        $this->objProposta->where(['ID'=>$id])->update([
            'APROVACAO_SOLICITANTE' => \Config::get('constants.SERVICOS.ACEITADO'),
        ]);

        $proposta = $this->objProposta->find($id);

        $this->objRegistros->create([
            'DATA' => date('d/m/Y \à\s H:i:s'),
            'TEXTO' => 'Proposta#'.$proposta->ID.' aceita',
            'ID_USUARIO' => auth()->user()->id
        ]);

        return true;
    }

    public function recusarProspostaSolicitante($id)
    {

        $this->objProposta->where(['ID'=>$id])->update([
            'APROVACAO_SOLICITANTE' => \Config::get('constants.SERVICOS.RECUSADO'),
        ]);

        $proposta = $this->objProposta->find($id);

        $this->objRegistros->create([
            'DATA' => date('d/m/Y \à\s H:i:s'),
            'TEXTO' => 'Proposta#'.$proposta->ID.' recusada',
            'ID_USUARIO' => auth()->user()->id
        ]);

        return true;
    }

}