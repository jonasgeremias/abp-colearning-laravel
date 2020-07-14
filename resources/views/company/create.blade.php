@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-primary pull-right" href="{{ route('company.index') }}" role="button">Voltar</a>
	<h2>Nova Empresa  </h2>
</div>

<form action="{{ route('company.store') }}" method="post" encType="multipart/form-data">
	@csrf
	<fieldset>
				
		<div class="form-group @if ($errors->has('nome_fantasia')) has-error @endif">
			<label class="control-label" for="nome_fantasia">Nome Fantasia</label>
			<input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
			@if ($errors->has('nome_fantasia'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('nome_fantasia') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('razao_social')) has-error @endif">
			<label class="control-label" for="razao_social">Razão Social</label>
			<input type="text" class="form-control" id="razao_social" name="razao_social">
			@if ($errors->has('razao_social'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('razao_social') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('cnpj')) has-error @endif">
			<label class="control-label" for="cnpj">CNPJ</label>
			<input type="text" class="form-control" id="cnpj" name="cnpj">
			@if ($errors->has('cnpj'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('cnpj') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('part_satc')) has-error @endif">
			<label class="control-label" for="part_satc">% Participação SATC</label>
			<input type="text" class="form-control" id="part_satc" name="part_satc">
			@if ($errors->has('part_satc'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('part_satc') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('nome_ceo')) has-error @endif">
			<label class="control-label" for="nome_ceo">Nome do CEO</label>
			<input type="text" class="form-control" id="nome_ceo" name="nome_ceo">
			@if ($errors->has('nome_ceo'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('nome_ceo') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('email')) has-error @endif">
			<label class="control-label" for="email">E-mail da Empresa</label>
			<input type="text" class="form-control" id="email" name="email">
			@if ($errors->has('email'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('data_inicio_contrato')) has-error @endif">
			<label class="control-label" for="data_inicio_contrato">Data inicio do contrato</label>
			<input type="date" class="form-control" id="data_inicio_contrato" name="data_inicio_contrato">
			@if ($errors->has('data_inicio_contrato'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('data_inicio_contrato') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('data_vigencia_1')) has-error @endif">
			<label class="control-label" for="data_vigencia_1">Data 1° vigencia</label>
			<input type="date" class="form-control" id="data_vigencia_1" name="data_vigencia_1">
			@if ($errors->has('data_vigencia_1'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('data_vigencia_1') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('data_vigencia_2')) has-error @endif">
			<label class="control-label" for="data_vigencia_2">Data 2° vigencia</label>
			<input type="date" class="form-control" id="data_vigencia_2" name="data_vigencia_2">
			@if ($errors->has('data_vigencia_2'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('data_vigencia_2') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('anexo_cont_social')) has-error @endif">
			<label class="control-label" for="anexo_cont_social">Contrato Social</label>
			<input onclick="this.value=null" onchange="" type="file" id="anexo_cont_social" name="anexo_cont_social" class="form-control btn btn-primary" accept="application/pdf" />
			@if ($errors->has('anexo_cont_social'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('anexo_cont_social') }}</strong>
			</span>
			@endif
		</div>

		<div style="display: flex;flex-direction: column;justify-content: center;">
		<p>
			<img class='anexo_cont_social' id='img_cont_social' style="width: 150px;height: 150px;" src="" alt="" />
			<button type="button" onclick="deleteContSocial()" class="btn btn-default btn-sm">Excluir Contrato</button>
		</p>
		</div>

		<div class="form-group @if ($errors->has('anexo_cont_incub')) has-error @endif">
			<label class="control-label" for="anexo_cont_incub">Contrato com a incubadora</label>
			<input onclick="this.value=null" onchange="" type="file" id="anexo_cont_incub" name="anexo_cont_incub" class="form-control btn btn-primary" accept="application/pdf" />
			@if ($errors->has('anexo_cont_incub'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('anexo_cont_incub') }}</strong>
			</span>
			@endif
		</div>

		<div style="display: flex;flex-direction: column;justify-content: center;">
		<p>
			<img class='anexo_cont_incub' id='img_cont_incub' style="width: 150px;height: 150px;" src="" alt="" />
			<button type="button" onclick="deleteContIncub()" class="btn btn-default btn-sm">Excluir Contrato</button>
		</p>
		</div>

		<div class="form-group @if ($errors->has('anexo_adit_incub')) has-error @endif">
			<label class="control-label" for="anexo_adit_incub">Aditivo de Contrato  com incubadora</label>
			<input onclick="this.value=null" onchange="" type="file" id="anexo_adit_incub" name="anexo_adit_incub" class="form-control btn btn-primary" accept="application/pdf" />
			@if ($errors->has('anexo_adit_incub'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('anexo_adit_incub') }}</strong>
			</span>
			@endif
		</div>

		<div style="display: flex;flex-direction: column;justify-content: center;">
		<p>
			<img class='anexo_adit_incub' id='img_adit_incub' style="width: 150px;height: 150px;" src="" alt="" />
			<button type="button" onclick="deleteAditIncub()" class="btn btn-default btn-sm">Excluir Contrato</button>
		</p>
		</div>

		<div class="form-group @if ($errors->has('obs')) has-error @endif">
			<label class="control-label" for="obs">Observações</label>
			<input type="obs" class="form-control" id="obs" name="obs">
			@if ($errors->has('obs'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('obs') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('status_id')) has-error @endif">
			<label class="control-label" for="status_id">Status</label>
			<select class="form-control" id="status_id" name="status_id">
				@foreach ($status as $id => $desc_status)
				<option value="{{ $id }}">{{ $desc_status }}</option>
				@endforeach
			</select>
			@if ($errors->has('status_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('status_id') }}</strong>
			</span>
			@endif
		</div>

						
		<button type="submit" class="btn btn-success">Cadastrar Empresa</button>
	</fieldset>

	
</form>
@endsection