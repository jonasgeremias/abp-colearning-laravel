@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('prestacaocontas.index') }}" role="button">Voltar</a>
  <h2>Visualizando Prestação de Contas Cadastradas</h2>
</div>

<p><strong>Código Prestação de Contas:</strong> {{ $prestacao->id }}</p>
<p><strong>Código Empresa:</strong> {{ $prestacao->empresa_id }} 
	<strong> Nome Empresa:</strong> {{ $prestacao->empresa()->first()->nome_fantasia }}</p>
<p><strong>Código Usuário</strong> {{ $prestacao->user_id }}
	<strong> Usuário:</strong> {{ $prestacao->user()->first()->name }}</p>
<p><strong>Registro Membros:</strong> {{ $prestacao->registro_membros_id }}</p>
<p><strong>Status:</strong> {{ $prestacao->status_id}} 
	<strong> {{ $prestacao->prestacaoStatus()->first()->desc_status}} </strong> </p>
<p><strong>Obervação:</strong> {{ $prestacao->obs }}</p>
@endsection
