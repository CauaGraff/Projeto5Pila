@extends('_theme')

@section('content')
<div class="row mt-1">
    <div class="col-md-6">
        <h1>Lista de Parâmetros</h1>
    </div>
    <div class="col-md-6">
        <a href="{{ route('parametros.create') }}" class="btn btn-primary float-md-end">Cadastrar Parâmetro</a>
    </div>
</div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table" id="myTable" style="width: 100%">
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

@section('js')
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
    $('.alert').delay(5000).fadeOut('slow');

} );
    </script>
@endsection
