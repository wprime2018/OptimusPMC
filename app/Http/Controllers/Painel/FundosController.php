<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fundos;
use Ixudra\Curl\Facades\Curl;
use App\Http\Requests\Painel\FundosFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Painel\FunctionsController;
class FundosController extends Controller
{
    public function index()
    {
        $title = 'Fundos - Cadastrados';
        $Fundos = Fundos::where('ativo','1')->get();
        return view('painel.fundos.index', compact('Fundos', 'title'));
    }

    public function create()
    {
        $title = 'Fundo';
        $tipoTela = 'Cadastrando';
        return view ('painel.fundos.create-edit', compact('title', 'tipoTela'));
    }

    public function store(FundosFormRequest $request)
    {
        $dataForm = $request->except('_token');
        $dataForm['ativo'] = ($dataForm['ativo'] == '') ? 0 : 1;
        $insert = Fundos::create($dataForm);
        if ($insert) {
            return redirect()->route('fundo.index');
        } else {
            return redirect()->route('fundo.create');
        }

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Fundos = Fundos::find($id);
        $tipoTela = 'Editando';
        $title = "Editar Fundo: {{$Fundos->codigo}}";

        return view('painel.fundos.create-edit', compact('title', 'Fundos', 'tipoTela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function cnpj(Request $request) 
    {
        $response = Curl::to("https://www.receitaws.com.br/v1/cnpj/".$request->cnpj)
                        ->withContentType('text/plain')                
                        ->asJson()
                        ->get();
        if ($response->status == 'OK'){
            $dadosCnpj = array();
            $dadosCnpj['cnpj'] = $response->cnpj;
            $dadosCnpj['status'] = $response->status;
            $dadosCnpj['tipo'] = $response->tipo;
            $dadosCnpj['nome'] = $response->nome;
            $dadosCnpj['fantasia'] = $response->fantasia;
            //$dadosCnpj['ativPrincipal'] = $response->atividade_principal->code.' - '.$response->atividade_principal->text;
            $dadosCnpj['situacao'] = $response->situacao;
            $dadosCnpj['logradouro'] = $response->logradouro;
            $dadosCnpj['numero'] = $response->numero;
            $dadosCnpj['bairro'] = $response->bairro;
            $dadosCnpj['cep'] = $response->cep;
            $dadosCnpj['municipio'] = $response->municipio;
            $dadosCnpj['uf'] = $response->uf;
            $dadosCnpj['natJuridica'] = $response->natureza_juridica;
            $dadosCnpj['telefone'] = $response->telefone;
            $dadosCnpj['email'] = $response->email;
        } else {

            $dadosCnpj['message'] = "CNPJ Inválido";
            $dadosCnpj['status'] = "ERROR";
        }
        return $dadosCnpj;
    }
}
