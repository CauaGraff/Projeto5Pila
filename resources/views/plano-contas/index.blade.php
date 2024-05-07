
@extends('_theme')

@section('content')
<div class="container">
    <h1>Plano de Contas</h1>

    <h2>Novo Plano de Contas</h2>

    <form action="{{ route('plano-contas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}">
            @error('descricao')
      <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="A">Analítico </option>
                <option value="S">Sintetico</option>
            </select>
        </div>
        @error('tipo')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <label for="agrupamento">Agrupamento:</label>
            <input type="text" name="agrupamento" id="agrupamento" class="form-control" value="{{ old('agrupamento') }}">
        </div>
        @error('agrupamento')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <hr>

    <h2>Lista de Planos de Contas</h2>

    <table class="table" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Agrupamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planosContas as $planoConta)
                <tr>
                    <td>{{ $planoConta->id }}</td>
                    <td>{{ $planoConta->descricao }}</td>
                    <td>{{ $planoConta->tipo }}</td>
                    <td>{{ $planoConta->agrupamento }}</td>
                    <td>
                        <a href="{{ route('plano-contas.edit', $planoConta) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('plano-contas.destroy', $planoConta) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#myTable').dataTable(); // Initialize DataTable
        });
    </script>
@endsection