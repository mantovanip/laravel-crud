<?php

namespace App\Http\Controllers;

use App\Models\Integrador;
use Illuminate\Http\Request;

class IntegradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //..recuperando os integrador do banco de dados
        $integradors = Integrador::all();
        //..retorna a view index passando a variável $integradors
        return view('integradors.index')->with('integradors', $integradors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //..retorna a view create
        return view('integradors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida os CPF/CNPJ de entrada
        $this->validate($request, [
            'cpf_cnpj' => 'required|cpf_cnpj',
            'formato_cnpj' => 'required|formato_cnpj',
            'formato_cpf' => 'required|formato_cpf',
        ]);
        //..instancia um novo model Integrador
        $integradors = new Integrador();
        //..pega os dados vindos do form e seta no model
        $integradors->cpf_cnpj = $request->input('cpf_cnpj');
        $integradors->nome_integrador = $request->input('nome_integrador');
        $integradors->nome_dono = $request->input('nome_dono');
        $integradors->cidade = $request->input('cidade');
        $integradors->estado = $request->input('estado');
        $integradors->marca_paineis = $request->input('marca_paineis');
        $integradors->porte = $request->input('porte');

        //..persiste o model na base de dados
        $integradors->save();

        //..retorna a view com uma variável msg que será tratada na própria view
        $integradors = Integrador::all();
        return view('integradors.index')->with('integradors', $integradors)
            ->with('msg', 'Integrador cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //..recupera o veículo da base de dados
        $integradors = Integrador::find($id);
        //..se encontrar o integrador retorna a view com o objeto correspondente
        if ($integradors) {
            return view('integradors.show')->with('integradors', $integradors);
        } else {
            //..senão, retorna a view com uma mensagem que será exibida.
            return view('integradors.show')->with('msg', 'Integrador não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //..recupera o veículo da base de dados
        $integradors = Integrador::find($id);
        //..se encontrar o veículo, retorna a view de ediçãcom com o objeto correspondente
        if ($integradors) {
            return view('integradors.edit')->with('integradors', $integradors);
        } else {
            //..senão, retorna a view de edição com uma mensagem que será exibida.
            $integradorss = Integrador::all();
            return view('integradors.index')->with('integradors', $integradorss)
                ->with('msg', 'Veículo não encontrado!');
        }
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
        // Recupera o integrador mediante o id
        $integrador = Integrador::find($id);

        // Atualiza os atributos do objeto recuperado com os dados do objeto Request
        $integrador->cpf_cnpj = $request->input('cpf_cnpj');
        $integrador->nome_integrador = $request->input('nome_integrador');
        $integrador->nome_dono = $request->input('nome_dono');
        $integrador->cidade = $request->input('cidade');
        $integrador->estado = $request->input('estado');
        $integrador->marca_paineis = $request->input('marca_paineis');
        $integrador->porte = $request->input('porte');

        // Persiste as alterações na base de dados
        $integrador->save();

        // Retorna a view index com uma mensagem
        $integradors = Integrador::all();
        return view('integradors.index')->with('integradors', $integradors)
            ->with('msg', 'Integrador atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // recupera o integrador a ser excluído
        $integradors = Integrador::find($id);

        // exclui o integrador
        $integradors->delete();

        // retorna à view index
        $integradors = Integrador::all();
        return view('integradors.index')->with('integradors', $integradors)
            ->with('msg', 'Integrador excluído com sucesso!');
    }
}
