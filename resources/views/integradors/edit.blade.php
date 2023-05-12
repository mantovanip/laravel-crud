@extends('base')

@section('content')
  <h2>Editar Integrador</h2>

  <form class="form" id="update-form" method="POST" action="{{ route('integradors.update', $integradors->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="cpf_cnpj">CPF/CNPJ:</label>
      <input type="text" id="cpf_cnpj" name="cpf_cnpj" value="{{ $integradors->cpf_cnpj }}" required autofocus>
    </div>

    <div class="form-group">
      <label for="nome_integrador">Nome do Integrador:</label>
      <input type="text" id="nome_integrador" name="nome_integrador" value="{{ $integradors->nome_integrador }}" required>
    </div>

    <div class="form-group">
      <label for="nome_dono">Nome do Dono:</label>
      <input type="text" id="nome_dono" name="nome_dono" value="{{ $integradors->nome_dono }}" required>
    </div>

    <div class="form-group">
      <label for="cidade">Cidade:</label>
      <input type="text" id="cidade" name="cidade" value="{{ $integradors->cidade }}" required>
    </div>

    <div class="form-group">
      <label for="estado">Estado:</label>
      <input type="text" id="estado" name="estado" value="{{ $integradors->estado }}" required>
    </div>

    <div class="form-group">
      <label for="marca_paineis">Marca de Painéis:</label>
      <input type="text" id="marca_paineis" name="marca_paineis" value="{{ $integradors->marca_paineis }}" required>
    </div>

    <div class="form-group">
      <label for="porte">Porte:</label>
      <input type="text" id="porte" name="porte" value="{{ $integradors->porte }}" required>
    </div>

    <div class="form-group">
      <button form="update-form" type="submit">Atualizar</button>
      <button form="delete-form" type="submit" value="Excluir">Excluir</button>
    </div>
  </form>

  <form method="POST" class="form" id="delete-form" action="{{ route('integradors.destroy', $integradors->id) }}">
    @csrf
    @method('DELETE')
  </form>
@endsection
