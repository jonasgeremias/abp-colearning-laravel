@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('pessoas.index') }}" role="button">Voltar</a>
  <h2>Visualizando Pessoa</h2>
</div>

<p><strong>Nome do Pessoa:</strong> {{ $pessoa->nome }}</p>
<p><strong>CPF do Pessoa:</strong> {{ $pessoa->cpf }}</p>
<p><strong>RG do Pessoa:</strong> {{ $pessoa->rg }}</p>
<p><strong>Gênero:</strong> {{ $tipos[$pessoa->tipo_id] }}</p>
<p><strong>Status:</strong> {{ $status[$pessoa->status_id] }}</p>
<p><strong>E-mail do Pessoa:</strong> <a href="mailto:{{ $pessoa->email }}">{{ $pessoa->email }}</a></p>
<p><strong>Usuário do WI-FI:</strong> {{ $pessoa->user_wifi }}</p>
<p><strong>Observações (opcional):</strong> {{ $pessoa->obs }}</p>


@endsection
