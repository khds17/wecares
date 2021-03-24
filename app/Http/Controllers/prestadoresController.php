<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestPrestador;
use App\Http\Requests\requestPrestadorEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\prestadores;
use App\Models\pacientes;
use App\Models\servicos;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\certificados;
use App\Models\antecedentes;
use App\Models\foto;
use App\Models\formacao;
use App\Models\sexo;
use App\Models\Propostas;
use App\Models\user;
use App\Models\familiaridade;
use App\Models\paciente_tipo;
use App\Models\paciente_localizacao;
use App\Models\registros_log;
use App\Config\constants;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class prestadoresController extends Controller
{
    //Instanciando as classes
    public function __construct()
    {
        $this->objPrestador = new prestadores();
        $this->objProposta = new Propostas();
        $this->objEstado = new estados();
        $this->objCidade = new cidades();
        $this->objEndereco = new enderecos();
        $this->objCertificado = new certificados();
        $this->objAntecedente = new antecedentes();
        $this->objFotos = new foto();
        $this->objFormacao = new formacao();
        $this->objSexos = new sexo();
        $this->objPacientes = new pacientes();
        $this->objUsers = new user();
        $this->objServico = new servicos();
        $this->objPacienteTipo = new paciente_tipo();
        $this->objPacienteLocalizacao = new paciente_localizacao();
        $this->objFamiliaridades = new familiaridade();
        $this->objRegistros = new registros_log();

    }

    public function cadastroPrestador()
    {
        // Encontra o prestador pelo usuario logado.
        $prestadores = $this->objPrestador->where('ID_USUARIO', auth()->user()->id)->get();

        $formacoes = $this->objFormacao
                         ->join('PRESTADORES', 'FORMACAO.ID', '=', 'PRESTADORES.ID_FORMACAO')
                         ->where('PRESTADORES.ID_USUARIO', auth()->user()->id)
                         ->get();

        return view('prestadores/cadastro',compact('prestadores','formacoes'));
    }

    public function prestadoresPropostas()
    {
        $propostas = $this->objProposta
                        ->join('PRESTADORES','PROPOSTAS.ID_PRESTADOR','=','PRESTADORES.ID')
                        ->where('PRESTADORES.ID_USUARIO', auth()->user()->id)
                        ->whereNull('PROPOSTAS.APROVACAO_PRESTADOR')
                        ->orWhere('PROPOSTAS.APROVACAO_PRESTADOR', '=', 0)
                        ->select('PROPOSTAS.*')
                        ->get();

        $servicos = $this->objServico->all();

        $familiaridades = $this->objFamiliaridades->all();

        return view('prestadores/propostas',compact('propostas','servicos','familiaridades'));
    }

    public function recebimentos()
    {
        return view('prestadores/recebimentos');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = $this->objEstado->all();

        $cidades = $this->objCidade->orderBy('CIDADE','asc')->get();

        $formacoes = $this->objFormacao->all();

        $sexos = $this->objSexos->all();

        return view('prestadores/create',compact('estados','cidades','formacoes','sexos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\requestPrestador  $request
     * @return \Illuminate\Http\Response
     */
    public function store(requestPrestador $request)
    {
        DB::beginTransaction();

        // Cadastra endereço, certificado, antecedentes crimimais, prestador, usuário, foto, função do prestador e log.
        try {
            $endereco = $this->objEndereco->create([
                'CEP' => $request->prestadorCep,
                'ENDERECO' => $request->prestadorEndereco,
                'NUMERO' => $request->prestadorNumero,
                'COMPLEMENTO' => $request->prestadorComplemento,
                'BAIRRO' => $request->prestadorBairro,
                'ID_CIDADE' => $request->prestadorCidade,
                'ID_ESTADO' => $request->prestadorEstado,
            ]);

            $certificado = $this->objCertificado->create([
                'CERTIFICADO' => $request->certificadoFormacao->store('certificados')
            ]);

            $antecedente = $this->objAntecedente->create([
                'ANTECEDENTE' => $request->antecedentes->store('antecedentes')
            ]);

            $foto = $this->objFotos->create([
                'FOTO' => $request->foto->store('fotos')
            ]);

            $usuario = $this->objUsers->create([
                'name' => $request->prestadorNome,
                'email' => $request->prestadorEmail,
                'password' => Hash::make($request['prestadorSenha']),
                'status'=> \Config::get('constants.STATUS.PENDENTE'),
            ]);

            $usuario->assignRole('cuidador/enfermeiro');

            $this->objPrestador->create([
                'NOME' => $request->prestadorNome,
                'CPF' => $request->prestadorCPF,
                'TELEFONE' => $request->prestadorTelefone,
                'DT_NASCIMENTO' => $request->prestadorNascimento,
                'ID_SEXO' => $request->sexo,
                'EMAIL' => $request->prestadorEmail,
                'ID_USUARIO' => $usuario->id,
                'ID_FORMACAO' => $request->formacao,
                'ID_CERTIFICADO' => $certificado->id,
                'ID_ANTECEDENTE' => $antecedente->id,
                'ID_ENDERECO' => $endereco->id,
                'ID_FOTO' => $foto->id,
            ]);

            $this->objRegistros->create([
                'DATA' => date('d/m/Y \à\s H:i:s'),
                'TEXTO' => 'Cadastro de '.$usuario->name.' realizado com sucesso',
                'ID_USUARIO' => $usuario->id
            ]);

            DB::commit();

            return redirect()->action('indexController@agradecimento');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->action('prestadoresController@create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Criando as variaveis com os objetos que podem ser usados na view
        $prestadores = $this->objPrestador->find($id);

        $enderecos = $this->objEndereco->find($id);

        $certificados = $this->objCertificado->find($id);

        $antecedentes = $this->objAntecedente->find($id);

        return view('prestadores/prestadores-informacoes',compact('prestadores','enderecos','certificados', 'antecedentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestadores = $this->objPrestador->find($id);

        $users = $prestadores->find($prestadores->ID)
                        ->relUsuario;

        $certificados = $prestadores->find($prestadores->ID)
                                ->relCertificado;

        $antecedentes = $prestadores->find($prestadores->ID)
                                ->relAntecedentes;

        $enderecos = $prestadores->find($prestadores->ID)
                            ->relEndereco;

        $arrayFotos = $this->objFotos
                    ->where('FOTOS.ID', '=', $prestadores->ID_FOTO)
                    ->get();

        foreach ($arrayFotos as $arrayFoto) {
            $foto = $arrayFoto;
        }

        $formacoes = $this->objFormacao->all();

        $sexos = $this->objSexos->all();

        $cidades = $this->objCidade->all();

        $estados = $this->objEstado->all();

        return view('prestadores/edit',compact('prestadores','users','sexos','enderecos','cidades','estados','formacoes','certificados','antecedentes', 'foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(requestPrestadorEdit $request, $id)
    {
        $prestadores = $this->objPrestador->find($id);

        DB::beginTransaction();
        // Atualiza endereço, certificado, antecedentes crimimais, prestador, foto, função do prestador e cria log de atualização.
        try {
            $this->objEndereco->where(['ID' => $prestadores->ID_ENDERECO])->update([
                'CEP' => $request->prestadorCep,
                'ENDERECO' => $request->prestadorEndereco,
                'NUMERO' => $request->prestadorNumero,
                'COMPLEMENTO' => $request->prestadorComplemento,
                'BAIRRO' => $request->prestadorBairro,
                'ID_CIDADE' => $request->prestadorCidade,
                'ID_ESTADO' => $request->prestadorEstado,
            ]);

            if($request->certificadoFormacao) {
                $this->objCertificado->where(['ID' => $prestadores->ID_CERTIFICADO])->update([
                    'CERTIFICADO' => $request->certificadoFormacao->store('certificados')
                ]);
            }

            else if($request->antecedentes) {
                $this->objAntecedente->where(['ID' => $prestadores->ID_ANTECEDENTE])->update([
                    'ANTECEDENTE' => $request->antecedentes->store('antecedentes')
                ]);
            }

            else if($request->foto) {
                $this->objFotos->where(['ID' => $prestadores->ID_FOTO])->update([
                    'FOTO' => $request->foto->store('fotos')
                ]);
            }

            $this->objUsers->where(['id' => $prestadores->ID_USUARIO])->update([
                'name' => $request->prestadorNome,
            ]);

            $this->objPrestador->where(['ID' => $id])->update([
                'NOME' => $request->prestadorNome,
                'CPF' => $request->prestadorCPF,
                'TELEFONE' => $request->prestadorTelefone,
                'ID_SEXO' => $request->sexo,
                'DT_NASCIMENTO' => $request->prestadorNascimento,
                'ID_FORMACAO' => $request->formacao,
            ]);

            $this->objRegistros->create([
                'DATA' => date('d/m/Y \à\s H:i:s'),
                'TEXTO' => 'Cadastro de '.$prestadores->NOME.' alterado com sucesso',
                'ID_USUARIO' => $prestadores->ID_USUARIO
            ]);

            DB::commit();

            return redirect()->action('prestadoresController@cadastroPrestador');

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->action('prestadoresController@edit');
        }
    }
}
