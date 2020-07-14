@extends('layouts.default')

@section('content')
<div class="page-header">
  <a class="btn btn-primary pull-right" href="{{ route('membros.index') }}" role="button">Voltar</a>
  <h2>Visualizando Dados do Membro</h2>
</div>

<p><strong>Código do Membro:</strong> {{ $membro->pessoa_id }}</p>
<p><strong>Código da Empresa:</strong> {{ $membro->empresa_id }}</p>
<p><strong>Função:</strong> {{ $membro->funcao_membro_id }}</p>
<p><strong>Usuário:</strong> {{ $membro->user_id }}</p>
<p><strong>Data Início:</strong> {{ $membro->data_inicio }}</p>
<p><strong>Data Vigência:</strong> {{ $membro->data_vigencia }}</p>
<p><strong>Documentos (opcional):</strong> {{ $membro->anexo_documentos }}</p>
<p><strong>Contrato:</strong> {{ $membro->anexo_contrato }}</p>
<p><strong>Status:</strong> {{ $status[$membro->status_id] }}</p>

@endsection
