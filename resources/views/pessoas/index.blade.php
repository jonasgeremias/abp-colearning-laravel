@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-success pull-right" href="{{ route('pessoas.create') }}" role="button"> + Adicionar Pessoa</a>
	<h2>Cadastro de Pessoas</h2>
</div>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Status</th>
					<th>Ações</th>
				</tr>
		</thead>
			<tbody>
			
				@foreach ($items as $pessoa)
				<tr>					
					<td>{{ $pessoa->id }}</td>
					<td>{{ $pessoa->nome }}</td>
					<td>{{ $pessoa->cpf }}</td>
					<td>{{ $status[$pessoa->status_id] }}</td>
					<td>
						<form action="{{ route('pessoas.destroy', $pessoa) }}" method="post">
							@method('DELETE')
							@csrf
							<div class="btn-group btn-group-xs" role="group" aria-label="Ações">
								<a class="btn btn-primary" href="{{ route('pessoas.edit', $pessoa) }}" role="button">Editar</a>
								<a class="btn btn-info" href="{{ route('pessoas.show', $pessoa) }}" role="button">Visualizar</a>
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