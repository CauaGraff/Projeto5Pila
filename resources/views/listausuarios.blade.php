@extends('_theme')

@section('title', 'Cadastrar Usuário')

@section('content')
    <div class="tile">
      <h3 class="tile-title">Listagem de Usuários</h3>
      <a href="{{route('user.cadastrar')}}" class="btn btn-primary">Cadastrar Usuário</a>

    </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Usuario</th>
              <th>Tipo</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach($usuarios as $usuario)
            <tr>
              <td>{{$usuario->id}}</td>
              <td>{{$usuario->user}}</td>
              <td>{{$usuario->type}}</td>
              <td>
                <a href="{{route('user.edit', ['id' => $usuario->id]) }}">Alterar</a> |
                <a href="{{route('user.del', ['id' => $usuario->id]) }}" onclick=" return confirm('Deseja mesmo apagar o usuário selecionado?')">Remover</a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>



  </div>
</div>
@endsection