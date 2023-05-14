{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
<h2>Cadastrar Novo Integrador</h2>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
<form class="container" method="POST" action="{{ route('integradors.store') }}">
    {{-- CSRF é um token de segurança para validar o formulário --}}
    @csrf
    <label for="cpf_cnpj">CPF ou CNPJ:</label>
    <input type="number" placeholder="Insira seu CPF/CNPJ " name="cpf_cnpj" id="cpf_cnpj" required>
    <label for="nome_integrador">Nome Integrador:</label>
    <input type="text" placeholder="Insira seu nome " name="nome_integrador" id="nome_integrador" required>
    <label for="nome_dono">Nome Dono:</label>
    <input type="text" placeholder="Insira seu nome " name="nome_dono" id="nome_dono" required>
    <label for="cidade">Cidade:</label>
    <input type="text" placeholder="Insira sua cidade" name="cidade" id="cidade" required>
    <label for="estado">Estado:</label>
    <input type="text" placeholder="Insira seu estado" name="estado" id="estado" required>
    <label for="marca_paineis">Marca de Paineis:</label>
    <select name="marca_paineis" id="marca_paineis" class="form-control">
        <option value="">SELECIONE</option>
        <option value="Canadian Solar">Canadian Solar</option>
        <option value="Trina Solar">Trina Solar</option>
        <option value="Jinko Solar">Jinko Solar</option>
        <option value="Ja Solar">Ja Solar</option>
        <option value="Hanwha Q-Cells">Hanwha Q-Cells</option>
        <option value="GCL-Si">GCL-Si</option>
    </select>
    <div class="form-group">
        <label for="porte">Porte da empresa:</label>
        <select id="porte" name="porte" required>
            <option value="">SELECIONE</option>
            <option value="Pequena">Pequena</option>
            <option value="Média">Média</option>
            <option value="Grande">Grande</option>
        </select>
    </div>

    <button class="btn" type="submit" value="Salvar">Salvar</button>
    <button class="btn" type="reset" value="Limpar">Limpar</button>

</form>
@endsection