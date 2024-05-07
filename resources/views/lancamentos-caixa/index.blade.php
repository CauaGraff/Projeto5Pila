@extends('_theme')

@section('title', 'Lancamento Caixa')

@section('content')
<div class="container">
    <h1>Lançamentos de Caixa</h1>
    <a href="{{ route('lancamentos-caixa.create') }}" class="btn btn-primary mb-2">Novo Lançamento</a>
    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Histórico</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lancamentos as $lancamento)
            <tr>
                <td>{{ $lancamento->data }}</td>
                <td>{{ $lancamento->historico }}</td>
                <td>{{ $lancamento->valor }}</td>
                <td>{{ $lancamento->tipo }}</td>
                <td>
                    <a href="{{ route('lancamentos-caixa.edit', $lancamento->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('lancamentos-caixa.destroy', $lancamento->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este lançamento?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection