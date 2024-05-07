@extends('_theme')

@section('content')
    <h1>Novo Parâmetro</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('parametros.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}">
            @error('descricao')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="indice">Índice:</label>
            <input type="text" name="indice" id="indice" class="form-control" value="{{ old('indice') }}">
            @error('indice')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="p_v">Porcentagem/Valor:</label>
            <select name="p_v" id="p_v" class="form-control">
                <option value="P">Porcentagem</option>
                <option value="V">Valor</option>
            </select>
            @error('p_v')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="aplicacao">Aplicação:</label>
            <input type="text" name="aplicacao" id="aplicacao" class="form-control" value="{{ old('aplicacao') }}">
            @error('aplicacao')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <hr>

    <h1>Lista de Parâmetros</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Índice</th>
                <th>Porcentagem/Valor</th>
                <th>Aplicação</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parametros as $parametro)
                <tr>
                    <td>{{ $parametro->id }}</td>
                    <td>{{ $parametro->descricao }}</td>
                    <td>{{ $parametro->indice }}</td>
                    <td>{{ $parametro->p_v }}</td>
                    <td>{{ $parametro->aplicacao }}</td>
                    <td>
                        <a href="{{ route('parametros.edit', $parametro) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('parametros.destroy', $parametro) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
