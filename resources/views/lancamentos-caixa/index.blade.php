@extends('_theme')

@section('content')
<div class="row mt-1">
    <div class="col-md-6">
        <h1>Fluxo de caixa</h1>
    </div>
    <div class="col-md-6">
        <a href="{{ route('lancamentos-caixa.create') }}" class="btn btn-primary float-md-end">Cadastrar Lancamento</a>
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
                <th>Tipo</th>
                <th>Conta</th>
                <th>Data Vencimento</th>
                <th>Data Baixa</th>
                <th>Juros</th>
                <th>Acrescimos</th>
                <th>Descontos</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lancamentos as $lancamento)
                <tr>
                    <td>{{ $lancamento->id }}</td>
                    <td>{{ date('d/m/Y', strtotime($lancamento->data)) }}</td>
                    <td>{{ $lancamento->historico }}</td>
                    <td>R${{ number_format($lancamento->valor,2,",",".")  }}</td>
                    <td>{{ $lancamento->tipo }}</td>
                    <td>{{ $lancamento->conta->descricao }}</td>
                    <td>@if (empty($lancamento->data_vencimento))
                        -
                    @else
                    {{ date('d/m/Y', strtotime($lancamento->data_vencimento)) }}
                    @endif
                        </td>
                    <td>@if (empty($lancamento->data_baixa))
                        -
                    @else
                    {{ date('d/m/Y', strtotime($lancamento->data_baixa)) }}
                    @endif
                        </td>
                        <td>R${{ number_format($lancamento->juros,2,",",".")  }}</td>
                        <td>R${{ number_format($lancamento->acrescimos,2,",",".")  }}</td>
                        <td>R${{ number_format($lancamento->descontos,2,",",".")  }}</td>
                    <td>
                        <a href="{{ route('lancamentos-caixa.edit', $lancamento) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('lancamentos-caixa.destroy', $lancamento) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                        @if(!$lancamento->data_baixa)
                        <form action="{{ route('lancamentos-caixa.baixa', $lancamento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Tem certeza que deseja dar baixa neste lançamento?')">Dar Baixa</button>
                        </form>
                    @endif                  
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
            buttons: ['csv', 'excel', 'pdf']
        }
    },
    responsive: true
  
   }
    );
    
    $('.alert').delay(5000).fadeOut('slow');

} );
    </script>
@endsection
