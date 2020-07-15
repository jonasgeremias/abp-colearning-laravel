@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-success pull-right" href="{{ route('prestacaocontas.create') }}" role="button"> + Nova Prestação de Contas</a>
	<h2>Prestação de Contas das Empresas</h2>
</div>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<!-- <td>Avatar</td> -->
				<th>Código</th>
				<th>Empresa</th>
				<th>Usuário</th>
				<th>Registro de Membros</th>
				<th>Status</th>
				<th>Mês de Referência</th>
				<th>Observação</th>
				<th>Anexo DRE</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($items as $prestacao)
			<tr>	
				<!--<td>
					@if($prestacao->avatar)
						<img class="avatar"  style="width: 50px;height: 50px;" src="{{ asset('storage/' . $prestacao->avatar) }}" alt="{{ $prestacao->name }}" /></p>
					@endif
				</td> -->
				<td>{{ $prestacao->id }}</td>
				<td>{{ $tipoP[$prestacao->empresa_id] }}</td>
				<td>{{ $prestacaoContaStatus[$prestacao->status_id] }}</td>
				<td>IdMembros</td>
				<!--<td>{{ $functiontipoP[$prestacao->registra_membros_id] }}</td>-->
				<td>{{ $statusP[$prestacao->status_id] }}</td>
				<td>{{ $prestacao->mes_referencia }}</td>
				<td>{{ $prestacao->obs }}</td>
				<td><a href="{{ asset('storage/' . $empresas->anexo_cont_social) }}"><img src="{{ asset('/images/doc-download.png') }}" style="width: 32px;height: auto;"></a></td>
				<td>
					<form action="{{ route('prestacaocontas.destroy', $prestacao) }}" method="post">
						@method('DELETE')
						@csrf
						<div class="btn-group btn-group-xs" role="group" aria-label="Ações">
							<a class="btn btn-primary" href="{{ route('prestacaocontas.edit', $prestacao) }}" role="button">Editar</a>
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