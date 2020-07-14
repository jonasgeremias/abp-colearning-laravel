@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-success pull-right" href="{{ route('company.create') }}" role="button"> + Adicionar Empresa</a>
	<h2>Empresas Cadastradas</h2>
</div>

<div class="table table-responsive">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome Fantasia</th>
				<th>Razão Social</th>
				<th>CNPJ</th>
				<th>% Participação SATC</th>
				<th>Nome do CEO</th>
				<th>E-mail da Empresa</th>
				<th>Data inicio do contrato</th>
				<th>Data 1° vigencia</th>
				<th>Data 2° vigencia</th>
				<th>Contrato Social</th>
				<th>Contrato com a incubadora</th>
				<th>Aditivo de Contrato  com incubadora</th>
				<th>Observações</th>
				<th>Status</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($items as $empresas)
			<tr>	
			
				<td>{{ $empresas->id }}</td>
				<td>{{ $empresas->nome_fantasia }}</td>
				<td>{{ $empresas->razao_social }}</td>
				<td>{{ $empresas->cnpj }}</td>
				<td>{{ $empresas->part_satc }}</td>
				<td>{{ $empresas->nome_ceo }}</td>
				<td>{{ $empresas->email }}</td>
				<td>{{ $empresas->data_inicio_contrato }}</td>
				<td>{{ $empresas->data_vigencia_1 }}</td>
				<td>{{ $empresas->data_vigencia_2 }}</td>
				<td><a href="{{ asset('storage/' . $empresas->anexo_cont_social) }}"><img src="{{ asset('/images/doc-download.png') }}" style="width: 32px;height: auto;"></a></td>
				<td><a href="{{ asset('storage/' . $empresas->anexo_cont_incub) }}"><img src="{{ asset('/images/doc-download.png') }}" style="width: 32px;height: auto;"></a></td>
				<td><a href="{{ asset('storage/' . $empresas->anexo_adit_incub) }}"><img src="{{ asset('/images/doc-download.png') }}" style="width: 32px;height: auto;"></a></td>
				<td>{{ $empresas->obs }}</td>
				<td>{{ $status[$empresas->status_id]}}</td>

				
				
				<td>
					<form action="{{ route('company.destroy', $empresas) }}" method="post">
						@method('DELETE')
						@csrf
						<div class="btn-group btn-group-xs" role="group" aria-label="Ações">
							<a class="btn btn-primary" href="{{ route('company.edit', $empresas) }}" role="button">Editar</a>
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