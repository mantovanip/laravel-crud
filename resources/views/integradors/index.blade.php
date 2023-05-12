{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
<h2>Integradores Cadastrado</h2>
{{-- se a variável $integradors não existir, mostra um h3 com uma mensagem --}}
@if (!isset($integradors))

{{-- senão, monta a tabela com o dados --}}
@else

<div class="table-responsive">
    <table class="table data-table w-100">
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
            {{-- itera sobre o integradores --}}
            @foreach ($integradors as $v)
            <tr>
                <th>{{ $v->id }}</th>
                <td>{{ $v->cpf_cnpj }}</td>
                <td>{{ $v->nome_integrador }}</td>
                <td>{{ $v->nome_dono }}</td>
                <td>{{ $v->cidade }}</td>
                <td>{{ $v->estado }}</td>
                <td>{{ $v->marca_paineis }}</td>
                <td>{{ $v->porte }}</td>
                {{-- vai para a rota show, passando o id como parâmetro --}}
                <td>
                    <a href="{{ route('integradors.edit', $v->id) }}" class="btn">Editar</a>
                    <a href="{{ route('integradors.show', $v->id) }}" class="btn">Exibir</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<tfoot>
    <tr>
        {{-- mostra a qtde de integradores cadastrados. --}}
        <td colspan="9">Integradores Cadastrados: {{ $integradors->count() }}</td>
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