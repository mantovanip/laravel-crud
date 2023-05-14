<?php

namespace App\Http\Controllers;

use App\Models\Integrador;
use Illuminate\Http\Request;
use App\Mocks\DadoMockado;

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
    // public function index()
    // {
    //     // gera dados fictícios usando o método gerarMockData()
    //     $integradors = $this->gerarMockData();

    //     // retorna a view index passando a variável $integradors
    //     return view('integradors.index', ['integradors' => $integradors]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function create()
    // {
    //     // gera dados fictícios usando o método gerarMockData()
    //     $integradors = $this->gerarMockData();

    //     // retorna a view create passando a variável $integradors
    //     return view('integradors.create', ['integradors' => $integradors]);
    // }

    public function create($id = null)
    {
        // Verifica se o id do registro foi fornecido
        if ($id) {
            // Se sim, busca o registro correspondente no banco de dados
            $integrador = Integrador::findOrFail($id);
    
            // Retorna a view create passando o registro encontrado
            return view('integradors.create', ['integrador' => $integrador]);
        } else {
            // Se não, gera dados fictícios usando o método gerarMockData()
            $integradors = $this->gerarMockData();
    
            // Retorna a view create passando os dados fictícios
            return view('integradors.create', ['integradors' => $integradors]);
        }
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
        $integradors = new Integrador();
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
    // public function show($id)
    // {
    //     $integradors = null;
    //     $dadosMockados = $this->gerarMockData();

    //     foreach ($dadosMockados as $dadoMockado) {
    //         if ($dadoMockado->id == $id) {
    //             $integradors = $dadoMockado;
    //             break;
    //         }
    //     }

    //     if ($integradors) {
    //         return view('integradors.show')->with('integradors', $integradors);
    //     } else {
    //         return view('integradors.show')->with('msg', 'Integrador não encontrado!');
    //     }
    // }
    public function show($id)
    {
        $integradors = Integrador::find($id);
    
        if ($integradors) {
            return view('integradors.show')->with('integradors', $integradors);
        } else {
            return view('integradors.show')->with('msg', 'Integrador não encontrado!');
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //..recupera o integrador da base de dados
    //     // $integradors = Integrador::find($id);
    //     $integradors = null;
    //     $dadosMockados = $this->gerarMockData();

    //     foreach ($dadosMockados as $dadoMockado) {
    //         if ($dadoMockado->id == $id) {
    //             $integradors = $dadoMockado;
    //             break;
    //         }
    //     }
    //     //..se encontrar o integrador, retorna a view de edição com o objeto correspondente
    //     if ($integradors) {
    //         return view('integradors.edit')->with('integradors', $integradors);
    //     } 
    //     else {
    //         //..senão, retorna a view de edição com uma mensagem que será exibida.
    //         $dadoMockado = Integrador::all();
    //         return view('integradors.index')->with('integradors', $dadoMockado)
    //             ->with('msg', 'Integrador não encontrado!');
    //     }
    // }

    public function edit($id)
    {
        $integradors = Integrador::find($id);
    
        if ($integradors) {
            return view('integradors.edit')->with('integradors', $integradors);
        } else {
            return redirect()->back()->with('error', 'Integrador não encontrado.');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     // Recupera o integrador mediante o id
    //     $integrador = Integrador::find($id);

    //     // Atualiza os atributos do objeto recuperado com os dados do objeto Request
    //     $integrador->cpf_cnpj = $request->input('cpf_cnpj');
    //     $integrador->nome_integrador = $request->input('nome_integrador');
    //     $integrador->nome_dono = $request->input('nome_dono');
    //     $integrador->cidade = $request->input('cidade');
    //     $integrador->estado = $request->input('estado');
    //     $integrador->marca_paineis = $request->input('marca_paineis');
    //     $integrador->porte = $request->input('porte');

    //     // Persiste as alterações na base de dados
    //     $integrador->save();
    //     // Tenta atualizar o Integrador
    //     $integradors = Integrador::find($id);
    //     if ($integradors) {
    //         $integradors->update($request->all());
    //         return redirect()->back()->with('success', 'Integrador atualizado com sucesso!');
    //     } else {
    //         return redirect()->back()->with('error', 'Erro ao atualizar o Integrador.')->withInput();
    //     }
    // }

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
        
        return redirect()->back()->with('success', 'Integrador atualizado com sucesso!');
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
    public function gerarMockData()
    {
        $dadosMockados = [];
        $dadoMockado1 = new Integrador();
        $dadoMockado1->id = 1;
        $dadoMockado1->cpf_cnpj = '123.456.789-10';
        $dadoMockado1->nome_integrador = 'Integrador A';
        $dadoMockado1->nome_dono = 'Dono A';
        $dadoMockado1->cidade = 'São Paulo';
        $dadoMockado1->estado = 'SP';
        $dadoMockado1->marca_paineis = 'Jinko Solar';
        $dadoMockado1->porte = 'Pequeno';
        array_push($dadosMockados, $dadoMockado1);


        $dadoMockado2 = new Integrador();
        $dadoMockado2->id = 2;
        $dadoMockado2->cpf_cnpj = '987.654.321-00';
        $dadoMockado2->nome_integrador = 'Integrador B';
        $dadoMockado2->nome_dono = 'Dono B';
        $dadoMockado2->cidade = 'Rio de Janeiro';
        $dadoMockado2->estado = 'RJ';
        $dadoMockado2->marca_paineis = 'Trina Solar';
        $dadoMockado2->porte = 'Médio';
        array_push($dadosMockados, $dadoMockado2);


        $dadoMockado3 = new Integrador();
        $dadoMockado3->id = 3;
        $dadoMockado3->cpf_cnpj = '111.222.333-44';
        $dadoMockado3->nome_integrador = 'Integrador C';
        $dadoMockado3->nome_dono = 'Dono C';
        $dadoMockado3->cidade = 'Curitiba';
        $dadoMockado3->estado = 'PR';
        $dadoMockado3->marca_paineis = 'Canadian Solar';
        $dadoMockado3->porte = 'Grande';
        array_push($dadosMockados, $dadoMockado3);


        $dadoMockado4 = new Integrador();
        $dadoMockado4->id = 4;
        $dadoMockado4->cpf_cnpj = '555.666.777-88';
        $dadoMockado4->nome_integrador = 'Integrador D';
        $dadoMockado4->nome_dono = 'Dono D';
        $dadoMockado4->cidade = 'Belo Horizonte';
        $dadoMockado4->estado = 'MG';
        $dadoMockado4->marca_paineis = 'Ja Solar';
        $dadoMockado4->porte = 'Médio';
        array_push($dadosMockados, $dadoMockado4);


        $dadoMockado5 = new Integrador();
        $dadoMockado5->id = 5;
        $dadoMockado5->cpf_cnpj = '999.888.777-66';
        $dadoMockado5->nome_integrador = 'Integrador E';
        $dadoMockado5->nome_dono = 'Dono E';
        $dadoMockado5->cidade = 'Recife';
        $dadoMockado5->estado = 'PE';
        $dadoMockado5->marca_paineis = 'Hanwha Q-Cells';
        $dadoMockado5->porte = 'Pequeno';
        array_push($dadosMockados, $dadoMockado5);


        $dadoMockado6 = new Integrador();
        $dadoMockado6->id = 6;
        $dadoMockado6->cpf_cnpj = '444.333.222-11';
        $dadoMockado6->nome_integrador = 'Integrador F';
        $dadoMockado6->nome_dono = 'Dono F';
        $dadoMockado6->cidade = 'Campinas';
        $dadoMockado6->estado = 'SP';
        $dadoMockado6->marca_paineis = 'GCL-Si';
        $dadoMockado6->porte = 'Grande';
        array_push($dadosMockados, $dadoMockado6);

        return $dadosMockados;
    }


    public function gerarDadosGrafico()
    {
        $integradors = $this->gerarMockData();

        $dados = [
            'estado' => [],
            'marca_paineis' => [],
            'porte' => [],
        ];

        foreach ($integradors as $integrador) {
            // adiciona o estado do integrador ao array de estados
            $estado = $integrador['estado'];
            if (array_key_exists($estado, $dados['estado'])) {
                $dados['estado'][$estado]++;
            } else {
                $dados['estado'][$estado] = 1;
            }

            // adiciona a marca_paineis do integrador ao array de marca_paineiss
            $marca_paineis = $integrador['marca_paineis'];
            if (array_key_exists($marca_paineis, $dados['marca_paineis'])) {
                $dados['marca_paineis'][$marca_paineis]++;
            } else {
                $dados['marca_paineis'][$marca_paineis] = 1;
            }

            // adiciona o porte do integrador ao array de portes
            $porte = $integrador['porte'];
            if (array_key_exists($porte, $dados['porte'])) {
                $dados['porte'][$porte]++;
            } else {
                $dados['porte'][$porte] = 1;
            }
        }

        return $dados;
    }
    public function dashboard()
    {
        $dados = $this->gerarDadosGrafico();
        return view('dashboard', ['dados' => $dados]);
    }
}
