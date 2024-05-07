@extends('_theme')

@section('content')
<div class="container">
    <h1>Editar Parâmetro</h1>

    <form action="{{ route('parametros.update', $parametro) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $parametro->descricao }}">
        </div>
        <div class="form-group">
            <label for="indice">Índice:</label>
            <input type="text" name="indice" id="indice" class="form-control" value="{{ $parametro->indice }}">
        </div>
        <div class="form-group">
            <label for="p_v">Porcentagem/Valor:</label>
            <select name="p_v" id="p_v" class="form-control">
                <option value="porcentagem" {{ $parametro->p_v === 'porcentagem' ? 'selected' : '' }}>Porcentagem</option>
                <option value="valor" {{ $parametro->p_v === 'valor' ? 'selected' : '' }}>Valor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="aplicacao">Aplicação:</label>
            <input type="text" name="aplicacao" id="aplicacao" class="form-control" value="{{ $parametro->aplicacao }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
