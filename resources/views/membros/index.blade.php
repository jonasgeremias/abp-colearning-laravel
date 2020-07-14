@extends('layouts.default')

@section('content')
<div class="page-header">

	<a class="btn btn-success pull-right" href="{{ route('membros.create') }}" role="button"> + Adicionar Membro</a>

	<h2>Membros</h2>
</div>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead>
				<tr>
					<th>Código Pessoal</th>
					<th>Código Empresa</th>
					<th>Função</th>
					<th>Usuário</th>
					<th>Data Inicio</th>
					<th>Data Vigência</th>
					<th>Documentos</th>
					<th>Contratos</th>
					<th>Status</th>
				</tr>
		</thead>
			<tbody>
			
				@foreach ($items as $membro)
				<tr>					
					<td>{{ $membro->pessoa_id }}</td>
					<td>{{ $membro->empresa_id }}</td>
					<td>{{ $membro->funcao_membro_id }}</td>
					<td>{{ $membro->user_id }}</td>
					<td>{{ $membro->data_inicio }}</td>
					<td>{{ $membro->data_vigencia }}</td>
					<td>{{ $membro->anexo_documentos }}</td>
					<td>{{ $membro->anexo_contrato }}</td>
					<td>{{ $status[$membro->status_id] }}</td>
					<td>
						<form action="{{ route('membros.destroy', $membro) }}" method="post">
							@method('DELETE')
							@csrf
							<div class="btn-group btn-group-xs" role="group" aria-label="Ações">
								<a class="btn btn-primary" href="{{ route('membros.edit', $membro) }}" role="button">Editar</a>
								<a class="btn btn-info" href="{{ route('membros.show', $membro) }}" role="button">Visualizar</a>
								<button class="btn btn-danger" type="submit">Deletar</button>
							</div>
						</form>
					</td>
				</tr>
				@endforeach				
			</tbody>
	</table>
</div>
@endsection