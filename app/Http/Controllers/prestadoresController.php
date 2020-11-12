<?php

namespace App\Http\Controllers;

use App\Http\Requests\requestPrestador;
use App\Http\Requests\requestPrestadorEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\prestadores;
use App\Models\estados;
use App\Models\cidades;
use App\Models\enderecos;
use App\Models\certificados;
use App\Models\antecedentes;
use App\Models\formacao;
use App\Models\sexo;
use App\Models\user;
use App\Config\constants;
use Illuminate\Support\Facades\DB;


class prestadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //Variaveis que vão receber os objetos do model
    private $objPrestador;
    private $objEstado;
    private $objCidade;
    private $objEndereco;
    private $objCertificado;
    private $objAntecedente;
    private $objFormacao;
    private $objSexos;
    private $objUsers;


    //Instanciando as classes
    public function __construct()
    {
        $this->objPrestador = new prestadores();
        $this->objEstado = new estados();
        $this->objCidade = new cidades();
        $this->objEndereco = new enderecos();
        $this->objCertificado = new certificados();
        $this->objAntecedente = new antecedentes();
        $this->objFormacao = new formacao();
        $this->objSexos = new sexo();
        $this->objUsers = new user();

    }

    public function index()
    {
        echo "Teste";
    }

    public function dadosCadastrais()
    {
        // Encontra o prestador pelo usuario logado.
        $prestadores = $this->objPrestador->where('ID_USUARIO', auth()->user()->id)->get();
        
        $formacoes = $this->objFormacao
                         ->join('PRESTADORES', 'FORMACAO.ID', '=', 'PRESTADORES.ID_FORMACAO')
                         ->where('PRESTADORES.ID_USUARIO', auth()->user()->id)
                         ->get();

        return view('prestadores/cadastro',compact('prestadores','formacoes'));
    }


    public function prestadoresLista(prestadores $prestadores)
    {
        $prestadores = $this->objPrestador->all();
        return view('prestadores/lista-prestadores',compact('prestadores'));
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
        $estados=$this->objEstado->all();
        $cidades=$this->objCidade->orderBy('CIDADE','asc')->get();
        $formacoes=$this->objFormacao->all();
        $sexos=$this->objSexos->all();
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
        // Pegando o valor da constant para colocar no prestador
        $status = \Config::get('constants.STATUS.PENDENTE');
        
        DB::beginTransaction();

        // Cadastro do endereço, certificado, antecedentes crimimais e prestador
        try {
            $endereco = $this->objEndereco->create([
                'CEP'=>$request->prestadorCep,
                'ENDERECO'=>$request->prestadorEndereco,
                'NUMERO'=>$request->prestadorNumero,
                'COMPLEMENTO'=>$request->prestadorComplemento,
                'BAIRRO'=>$request->prestadorBairro,
                'ID_CIDADE'=>$request->prestadorCidade,
                'ID_ESTADO'=>$request->prestadorEstado,
            ]);

            //Gravando o id do endereco
            $idEndereco = $endereco->id;
            
            $certificado = $this->objCertificado->create([
                'CERTIFICADO'=>$request->certificadoFormacao->store('certificados')
            ]);

            //Gravando o id do certificado
            $idCertificado = $certificado->id;
    
            $antecedente = $this->objAntecedente->create([
                'ANTECEDENTE'=>$request->antecedentes->store('antecedentes')
            ]);

            //Gravando o id do antecedente criminal
            $idAntedecente = $antecedente->id;

            $usuario = $this->objUsers->create([
                'name' => $request->prestadorNome,
                'email' => $request->prestadorEmail,
                'password' => Hash::make($request['prestadorSenha']),
            ]);

            //Gravando o id do antecedente criminal
            $idUsuario = $usuario->id;
                
            $prestador = $this->objPrestador->create([
                'NOME'=>$request->prestadorNome,
                'CPF'=>$request->prestadorCPF,
                'TELEFONE'=>$request->prestadorTelefone,
                'DT_NASCIMENTO'=>$request->prestadorNascimento,
                'ID_SEXO'=>$request->sexo,
                'EMAIL'=>$request->prestadorEmail,
                'ID_USUARIO'=>$idUsuario,
                'ID_FORMACAO'=>$request->formacao,
                'ID_CERTIFICADO'=>$idCertificado,
                'ID_ANTECEDENTE'=>$idAntedecente,
                'ID_ENDERECO'=>$idEndereco,
                'STATUS'=>$status
            ]);

            DB::commit();
                
            return redirect()->action('indexController@agradecimento');
            
        } catch (\Exception $e) {
            // dd('Oi');

            DB::rollback();

            return redirect()->action('prestadoresController@create');

            // return response()->json([
            //     'message' => $e->getMessage(),
            //     'data' => '',
            //     'result' => false,
            // ], 401);


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
        $prestadores=$this->objPrestador->find($id);
        $enderecos=$this->objEndereco->find($id);
        $certificados=$this->objCertificado->find($id);
        $antecedentes=$this->objAntecedente->find($id);

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
        $prestadores= $this->objPrestador->find($id);

        $users = $prestadores->find($prestadores->ID)
                        ->relUsuario;

        $certificados = $prestadores->find($prestadores->ID)
                                ->relCertificado;

        $antecedentes = $prestadores->find($prestadores->ID)
                                ->relAntecedentes;

        $enderecos = $prestadores->find($prestadores->ID)
                            ->relEndereco;

        $formacoes = $this->objFormacao->all();
        $sexos = $this->objSexos->all();
        $cidades = $this->objCidade->all();
        $estados = $this->objEstado->all();

        return view('prestadores/edit',compact('prestadores','users','sexos','enderecos','cidades','estados','formacoes','certificados','antecedentes'));
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
        $prestadores= $this->objPrestador->find($id);

        $users = $prestadores->find($prestadores->ID)
                        ->relUsuario;

        $certificados = $prestadores->find($prestadores->ID)
                                ->relCertificado;

        $antecedentes = $prestadores->find($prestadores->ID)
                                ->relAntecedentes;

        $enderecos = $prestadores->find($prestadores->ID)
                            ->relEndereco;


        DB::beginTransaction();

        try {

            $this->objEndereco->where(['ID' => $enderecos->ID])->update([
                'CEP'=>$request->prestadorCep,
                'ENDERECO'=>$request->prestadorEndereco,
                'NUMERO'=>$request->prestadorNumero,
                'COMPLEMENTO'=>$request->prestadorComplemento,
                'BAIRRO'=>$request->prestadorBairro,
                'ID_CIDADE'=>$request->prestadorCidade,
                'ID_ESTADO'=>$request->prestadorEstado,
            ]);

            $this->objCertificado->where(['ID' => $prestadores->ID_CERTIFICADO])->update([
                'CERTIFICADO'=>$request->certificadoFormacao->store('certificados')
            ]);

            // $this->objAntecedente->where(['ID' => $prestadores->ID_ANTECEDENTE])->update([
            //     'ANTECEDENTE'=>$request->antecedentes->store('antecedentes')
            // ]);

            $this->objUsers->where(['id' => $prestadores->ID_USUARIO])->update([
                'name' => $request->prestadorNome,
                'email' => $request->prestadorEmail,
            ]);

            $this->objPrestador->where(['ID' => $id])->update([
                'NOME'=>$request->prestadorNome,
                'CPF'=>$request->prestadorCPF,
                'TELEFONE'=>$request->prestadorTelefone,
                'DT_NASCIMENTO'=>$request->prestadorNascimento,
                'EMAIL'=>$request->prestadorEmail,
            ]);
            
        return redirect()->action('prestadoresController@dadosCadastrais');

        DB::commit();

        } catch (\Throwable $th) {
            
            DB::rollback();
            dd('Caiu no catch');
        }
    }

    public function aprovar($id)
    {
        // Pegando o valor da constant para colocar no prestador
        $statusAprovado = \Config::get('constants.STATUS.ATIVO');

        $this->objPrestador->where(['ID'=>$id])->update([
            'STATUS'=>$statusAprovado
        ]);

        // return redirect()->route('/prestadoreslista');

        // return redirect('prestadoreslista');

    }

    public function reprovar($id)
    {
        // Pegando o valor da constant para colocar no prestador
        $statusReprovado = \Config::get('constants.STATUS.REPROVADO');

        $this->objPrestador->where(['ID'=>$id])->update([
            'STATUS'=>$statusReprovado
        ]);

        // return redirect('prestadoreslista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
