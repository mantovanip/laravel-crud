{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
<h2>Integradores Cadastrados</h2>
{{-- se a variável $integradors não existir, mostra um h3 com uma mensagem --}}
@if (!isset($integradors))
<h3 style="color: red">Nenhum Registro Encontrado!</h3>
{{-- senão, monta a tabela com o dados --}}
@else
<table class="data-table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">CPF/CNPJ</th>
            <th scope="col">Nome do Integrador</th>
            <th scope="col">Nome do Dono</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Marca de Painéis</th>
            <th scope="col">Porte</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        {{-- itera sobre a coleção de integradores --}}
        @foreach ($integradors as $v)
        <tr>
            <th scope="row">{{ $integrador->id }}</th>
            <td>{{ $integrador->cpf_cnpj }}</td>
            <td>{{ $integrador->nome_integrador }}</td>
            <td>{{ $integrador->nome_dono }}</td>
            <td>{{ $integrador->cidade }}</td>
            <td>{{ $integrador->estado }}</td>
            <td>{{ $integrador->marca_paines }}</td>
            <td>{{ $integrador->porte }}</td>
            {{-- vai para a rota show, passando o id como parâmetro --}}
            <td> <a href="{{ route('integradors.show', $v->id) }}">Exibir</a> </td>
            <td> <a href="{{ route('integradors.edit', $v->id) }}">Editar</a> </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            {{-- mostra a qtde de integradores cadastrados. --}}
            <td colspan="5">Integradores Cadastrados: {{ $integradors->count() }}</td>
        </tr>
    </tfoot>
</table>
@endif
@if(isset($msg))
<script>
    alert("{{$msg}}");
</script>
@endif
@endsection