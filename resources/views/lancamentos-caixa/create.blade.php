
@extends('_theme')

@section("title", "Novo Lançamento de Caixa")

@section('content')
<div class="container">
    <h1>Novo Lançamento de Caixa</h1>
    <a href="{{ route('plano-contas.index') }}" class="btn btn-primary mb-2">PLANO DE CONTA</a>

    <form action="{{ route('lancamentos-caixa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" name="data" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="historico">Histórico:</label>
            <input type="text" name="historico" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" name="valor" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select name="tipo" class="form-control" required>
                <option value="C">Crédito</option>
                <option value="D">Débito</option>
            </select>
        </div>
        <div class="form-group">
            <label for="conta_id">Conta:</label>
            <select name="conta_id" class="form-control" required>
                @foreach($contas as $conta)
                    <option value="{{ $conta->id }}">{{ $conta->descricao }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
