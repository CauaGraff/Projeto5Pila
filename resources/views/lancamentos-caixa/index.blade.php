@extends('_theme')

@section('content')
<div class="row mt-1">
    <div class="col-md-6">
        <h1>Lista de Parâmetros</h1>
    </div>
    <div class="col-md-6">
        <a href="{{ route('lancamentos-caixa.create') }}" class="btn btn-primary float-md-end">Cadastrar Parâmetro</a>
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
                <th>Nº</th>
                <th>Data</th>
                <th>Histórico</th>
                <th>Valor</th>
                <th>Conta</th>
                <th>Data da Baixa</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lancamentos as $lancamento)
                <tr>
                    <td>{{ $lancamento->id }}</td>
                    <td>{{ date('d/m/Y', strtotime($lancamento->data)) }}</td>
                    <td>{{ $lancamento->historico }}</td>
                    <td>{{ $lancamento->valor }}</td>
                    <td>{{ $lancamento->conta->descricao }}</td>
                    <td>{{ $lancamento->data_baixa }}</td>
                    <td>
                        <a href="{{ route('lancamentos-caixa.edit', $lancamento) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('lancamentos-caixa.destroy', $lancamento) }}" method="POST" style="display: inline;">
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
    $('#myTable').DataTable({
        layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }    }
    );
    
    $('.alert').delay(5000).fadeOut('slow');

} );
    </script>
@endsection
