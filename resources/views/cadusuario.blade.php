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
            <input type="hidden" name="id" value="{{ isset($usuario) ? $usuario->id : '' }}" />
            <div class="form-group col-md-3">
              <label class="control-label">Usuario</label>
              <input class="form-control" type="text" name="user" value="{{ isset($usuario) ? $usuario->user : '' }}" placeholder="Insira seu Usuario" autofocus required>
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Senha</label>
              <input class="form-control" type="password" name="password" placeholder="Insira sua senha" @if(empty($usuario->id)) required @endif>
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Tipo</label>
              <select class="form-select form-select-sm" name="tipo" id="tipo" aria-label=".form-select-sm example">
                <option selected>Selecione o tipo o usuario</option>
                <option value="A"  {{ isset($usuario) && $usuario->type =="A" ? "selected" : "" }}>Administrador</option>
                <option value="U"  {{ isset($usuario) && $usuario->type =="U" ? "selected" : "" }}>Usuario</option>
              </select>
            </div>
            <div class="form-group col-md-4 align-self-end">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>@if(empty($usuario->id)) Cadastrar @endif @if(!empty($usuario->id)) Alterar @endif</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
