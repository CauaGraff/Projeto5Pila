@extends('_theme')

@section('content')
<div class="container">
    <h1>Novo Parâmetro</h1>

    <form action="{{ route('parametros.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}">
            @error('descricao')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="indice" class="form-label">Índice:</label>
            <input type="text" name="indice" id="indice" class="form-control" value="{{ old('indice') }}">
            @error('indice')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="p_v" class="form-label">Porcentagem/Valor:</label>
            <select name="p_v" id="p_v" class="form-select">
                <option value="">Selecione</option>
                <option value="P">Porcentagem</option>
                <option value="V">Valor</option>
            </select>
            @error('p_v')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="aplicacao" class="form-label">Aplicação:</label>
            <input type="text" name="aplicacao" id="aplicacao" class="form-control" value="{{ old('aplicacao') }}">
            @error('aplicacao')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
