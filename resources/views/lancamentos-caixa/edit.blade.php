@extends('_theme')

@section("title", "Editar Lançamento de Caixa")

@section('content')
<div class="container">
    <h1>Editar Lançamento de Caixa</h1>
    <a href="{{ route('plano-contas.index') }}" class="btn btn-primary mb-2">PLANO DE CONTA</a>

    <form action="{{ route('lancamentos-caixa.update', $lancamento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" name="data" class="form-control" value="{{ $lancamento->data }}" required>
        </div>
        <div class="form-group">
            <label for="historico">Histórico:</label>
            <input type="text" name="historico" class="form-control" value="{{ $lancamento->historico }}" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" name="valor" class="form-control" step="0.01" value="{{ $lancamento->valor }}" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select name="tipo" class="form-control" required>
                <option value="C" {{ $lancamento->tipo == 'C' ? 'selected' : '' }}>Crédito</option>
                <option value="D" {{ $lancamento->tipo == 'D' ? 'selected' : '' }}>Débito</option>
            </select>
        </div>
        <div class="form-group">
            <label for="conta_id">Conta:</label>
            <select name="conta_id" class="form-control" required>
                @foreach($contas as $conta)
                    <option value="{{ $conta->id }}" {{ $lancamento->conta_id == $conta->id ? 'selected' : '' }}>{{ $conta->descricao }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
