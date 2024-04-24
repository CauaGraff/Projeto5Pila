@extends('_theme')

@section('title', 'Cadastrar Usuário')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Cadastrar Usuário</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Formulário de @if(empty($usuario->id)) Cadastro @endif @if(!empty($usuario->id)) Alteração @endif</h3>
      <div class="tile-body">
        @error('error')
        <p class="text-danger text-center">{{ $message }}</p>
     @enderror
        <form class="row" method="post" action="{{route('user.post.register')}}">
          @csrf
          <input type="hidden" name="id" value="{{$usuario->id ?? ''}}" />
          <div class="form-group col-md-3">
            <label class="control-label">Usuario</label>
            <input class="form-control" type="text" name="user" value="{{$usuario->email ?? ''}}" placeholder="Insira seu e-mail" autofocus required>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Senha</label>
            <input class="form-control" type="password" name="password" placeholder="Insira sua senha" @if(empty($usuario->id)) required @endif>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Tipo</label>
          <select class="form-select form-select-sm" name="tipo" id="tipo" aria-label=".form-select-sm example">
            <option selected>Selecione o tipo o usuario</option>
            <option value="Administrador">Administrador</option>
            <option value="Usuario">Usuario</option>
          </select>
          </div>
          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>@if(empty($usuario->id)) Cadastrar @endif @if(!empty($usuario->id)) Alterar @endif</button>
          </div>
        </form>
      </div>
    </div>

    <hr>


    <div class="tile">
      <h3 class="tile-title">Listagem de Usuários</h3>
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
                {{-- <a href="{{route('usuario-edit', ['id' => $usuario->id]) }}">Alterar</a> |
                <a href="{{route('usuario-del', ['id' => $usuario->id]) }}" onclick=" return confirm('Deseja mesmo apagar o usuário selecionado?')">Remover</a> --}}
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





{{--@extends('_theme')

@section("title", "Página Usuarios")

@section('content')
    


 <form action="{{ route('user.post.register') }}" method="POST">
    <span>Cadastrar usuario</span>
    @if (session()->has('success'))
    {{ session()->get('success') }} 
    @endif
    @error('error')
       <p class="text-danger text-center">{{ $message }}</p>
    @enderror
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="group-input">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user">
        @error('user')
           <span class="text-danger text-center">{{ $message }}</span>
           @enderror
    </div>
    <div class="group-input">
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password">
        @error('password')
           <span class="text-danger text-center">{{ $message }}</span>
           @enderror
    </div>
    <div class="class">
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo">
            <option value="">Selecione o tipo</option>
            <option value="A">Administrador</option>
            <option value="U">Usuario Normal</option>
        </select>
        @error('tipo')
           <span class="text-danger text-center">{{ $message }}</span>
           @enderror
    </div>
    <button type="submit">Cadastrar</button>
</form>

<hr>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Tipo</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
    <tr>
        <td>{{$usuario->id}}</td>
        <td>{{$usuario->user}}</td>
        <td>{{$usuario->type}}</td>
    </tr>
        @endforeach
    </tbody>
</table>



@endsection

{{-- @section('js')
<script>
    $(function () {
        var $form = $("form")

        $form.submit(function (e) { 
            e.preventDefault();
            
            var method = $form.attr("method");
            var action = $form.attr("action");

            $.ajax({
                type: method,
                url: action,
                data: $form.serialize(),
                dataType: "json",
                success: function (response) {
                    if(response.type =="sucess"){
                        location.href = response.redirect;
                    }
                }
            });
        });
    })
</script>
@endsection  --}}