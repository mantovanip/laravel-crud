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
        return [
            ['id' => 1,            'cpf_cnpj' => '123.456.789-10',            'nome_integrador' => 'Integrador A',            'nome_dono' => 'Dono A',            'cidade' => 'São Paulo',         'estado' => 'SP',   'marca_paineis' => 'Jinko Solar',     'porte' => 'Pequeno'],
            ['id' => 2,            'cpf_cnpj' => '987.654.321-00',            'nome_integrador' => 'Integrador B',            'nome_dono' => 'Dono B',            'cidade' => 'Rio de Janeiro',    'estado' => 'RJ',   'marca_paineis' => 'Trina Solar',     'porte' => 'Médio'],
            ['id' => 3,            'cpf_cnpj' => '111.222.333-44',            'nome_integrador' => 'Integrador C',            'nome_dono' => 'Dono C',            'cidade' => 'Curitiba',          'estado' => 'PR',   'marca_paineis' => 'Canadian Solar',  'porte' => 'Grande'],
            ['id' => 4,            'cpf_cnpj' => '555.666.777-88',            'nome_integrador' => 'Integrador D',            'nome_dono' => 'Dono D',            'cidade' => 'Belo Horizonte',    'estado' => 'MG',   'marca_paineis' => 'Ja Solar',        'porte' => 'Médio'],
            ['id' => 5,            'cpf_cnpj' => '999.888.777-66',            'nome_integrador' => 'Integrador E',            'nome_dono' => 'Dono E',            'cidade' => 'Recife',            'estado' => 'PE',   'marca_paineis' => 'Hanwha Q-Cells',  'porte' => 'Pequeno'],
            ['id' => 6,            'cpf_cnpj' => '444.333.222-11',            'nome_integrador' => 'Integrador F',            'nome_dono' => 'Dono F',            'cidade' => 'Campinas',          'estado' => 'SP',   'marca_paineis' => 'GCL-Si',          'porte' => 'Grande'],
            ['id' => 7,            'cpf_cnpj' => '000.333.222-11',            'nome_integrador' => 'Integrador G',            'nome_dono' => 'Dono F',            'cidade' => 'Marilia',           'estado' => 'SP',   'marca_paineis' => 'GCL-Si',          'porte' => 'Grande'],
            ['id' => 8,            'cpf_cnpj' => '777.888.999-00',            'nome_integrador' => 'Integrador H',            'nome_dono' => 'Dono H',            'cidade' => 'Porto Alegre',      'estado' => 'RS',   'marca_paineis' => 'JA Solar',        'porte' => 'Médio'],
            ['id' => 9,            'cpf_cnpj' => '555.444.333-22',            'nome_integrador' => 'Integrador I',            'nome_dono' => 'Dono I',            'cidade' => 'Fortaleza',         'estado' => 'CE',   'marca_paineis' => 'Canadian Solar',  'porte' => 'Grande'],
            ['id' => 10,           'cpf_cnpj' => '222.111.000-33',            'nome_integrador' => 'Integrador J',            'nome_dono' => 'Dono J',            'cidade' => 'Salvador',          'estado' => 'BA',   'marca_paineis' => 'Jinko Solar',     'porte' => 'Pequeno'],
            ['id' => 11,           'cpf_cnpj' => '999.000.111-22',            'nome_integrador' => 'Integrador K',            'nome_dono' => 'Dono K',            'cidade' => 'Goiânia',           'estado' => 'GO',   'marca_paineis' => 'Hanwha Q-Cells',  'porte' => 'Pequeno'],
            ['id' => 12,           'cpf_cnpj' => '444.333.222-11',            'nome_integrador' => 'Integrador L',            'nome_dono' => 'Dono L',            'cidade' => 'Florianópolis',     'estado' => 'SC',   'marca_paineis' => 'Trina Solar',     'porte' => 'Médio'],
            ['id' => 13,           'cpf_cnpj' => '123.456.789-10',            'nome_integrador' => 'Integrador M',            'nome_dono' => 'Dono M',            'cidade' => 'Natal',             'estado' => 'RN',   'marca_paineis' => 'Jinko Solar',     'porte' => 'Pequeno'],
            ['id' => 14,           'cpf_cnpj' => '000.111.222-33',            'nome_integrador' => 'Integrador N',            'nome_dono' => 'Dono N',            'cidade' => 'Vitória',           'estado' => 'ES',   'marca_paineis' => 'Canadian Solar',  'porte' => 'Grande'],

        ];
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
