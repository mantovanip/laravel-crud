{{-- herda a view base --}}
@extends('base')
{{-- define o conteúdo --}}
@section('content')
{{-- caso exista a variável msg, exibe uma mensagem --}}
@if (isset($msg))
<h3 style="color: red">Integradors não encontrado!</h3>
@else
{{-- senão, mostra os daddos --}}
<h2>Detalhes do Integrador</h2>
<div>
    <p><strong>ID:</strong> {{ $integradors->id }}</p>
    <p><strong>CPF/CNPJ:</strong> {{ $integradors->cpf_cnpj }}</p>
    <p><strong>Nome do Integrador:</strong> {{ $integradors->nome_integrador }}</p>
    <p><strong>Nome do Dono:</strong> {{ $integradors->nome_dono }}</p>
    <p><strong>Cidade:</strong> {{ $integradors->cidade }}</p>
    <p><strong>Estado:</strong> {{ $integradors->estado }}</p>
    <p><strong>Marca de Painéis:</strong> {{ $integradors->marca_paineis }}</p>
    <p><strong>Porte:</strong> {{ $integradors->porte }}</p>

    <a class="btn" href="{{ route('integradors.index') }}">Voltar</a>


</div>
@endif
@endsection