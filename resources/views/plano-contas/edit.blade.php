
@extends('_theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Conta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('plano-contas.update', $conta->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao', $conta->descricao) }}" required autofocus>

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>

                            <div class="col-md-6">
                                <select id="tipo" class="form-control @error('tipo') is-invalid @enderror" name="tipo" required>
                                    <option value="A" {{ old('tipo', $conta->tipo) == 'A' ? 'selected' : '' }}>Analítico</option>
                                    <option value="S" {{ old('tipo', $conta->tipo) == 'S' ? 'selected' : '' }}>Sintético</option>
                                </select>

                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agrupamento" class="col-md-4 col-form-label text-md-right">Agrupamento</label>

                            <div class="col-md-6">
                                <input id="agrupamento" type="text" class="form-control @error('agrupamento') is-invalid @enderror" name="agrupamento" value="{{ old('agrupamento', $conta->agrupamento) }}" required>

                                @error('agrupamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar Conta
                                </button>
                                <a href="{{ route('plano-contas.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
