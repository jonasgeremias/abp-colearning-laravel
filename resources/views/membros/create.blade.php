@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-primary pull-right" href="{{ route('membros.index') }}" role="button">Voltar</a>
	<h2>Novo Membro</h2>
</div>
<!-- editando -->
<form action="{{ route('membro.store') }}" method="post">
	@csrf
	<fieldset>
		
		<div class="form-group @if ($errors->has('pessoa_id')) has-error @endif">
			<label class="control-label" for="pessoa_id">Código Pessoa</label>
			<input type="text" class="form-control" id="pessoa_id" name="pessoa_id">
			@if ($errors->has('pessoa_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('pessoa_id') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('empresa_id')) has-error @endif">
			<label class="control-label" for="empresa_id">Código Pessoa</label>
			<input type="text" class="form-control" id="empresa_id" name="empresa_id">
			@if ($errors->has('empresa_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('empresa_id') }}</strong>
			</span>
			@endif
		</div>
 
		<div class="form-group @if ($errors->has('funcao_membro_id')) has-error @endif">
			<label class="control-label" for="funcao_membro_id">Função</label>
			<input type="text" class="form-control" id="funcao_membro_id" name="funcao_membro_id">
			@if ($errors->has('funcao_membro_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('funcao_membro_id') }}</strong>
			</span>
			@endif
		</div>
		 
			<div class="form-group @if ($errors->has('user_id')) has-error @endif">
			<label class="control-label" for="user_id">Usuário</label>
			<input type="user_id" class="form-control" id="user_id" name="user_id">
			@if ($errors->has('user_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('user_id') }}</strong>
			</span>
			@endif
		</div>

		 <div class="form-group @if ($errors->has('data_inicio')) has-error @endif">
			<label class="control-label" for="data_inicio">Data Início</label>
			<input type="data_inicio" class="form-control" id="data_inicio" name="data_inicio">
			@if ($errors->has('data_inicio'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('data_inicio') }}</strong>
			</span>
			@endif
		</div>
		 
		 <div class="form-group @if ($errors->has('data_vigencia')) has-error @endif">
			<label class="control-label" for="data_vigencia">Data Vigência</label>
			<input type="data_vigencia" class="form-control" id="data_vigencia" name="data_vigencia">
			@if ($errors->has('data_vigencia'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('data_vigencia') }}</strong>
			</span>
			@endif
		</div>
		
		<div class="form-group @if ($errors->has('anexo_documentos')) has-error @endif">
			<label class="control-label" for="anexo_documentos">Documentos (opcional)</label>
			<input type="text" class="form-control" id="anexo_documentos" name="anexo_documentos">
			@if ($errors->has('anexo_documentos'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('anexo_documentos') }}</strong>
			</span>
			@endif
		</div>
		
		<div class="form-group @if ($errors->has('anexo_documentos')) has-error @endif">
			<label class="control-label" for="anexo_documentos">Documentos (opcional)</label>
			<input type="text" class="form-control" id="anexo_documentos" name="anexo_documentos">
			@if ($errors->has('anexo_documentos'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('anexo_documentos') }}</strong>
			</span>
			@endif
		</div>
		
		<div class="form-group @if ($errors->has('status_id')) has-error @endif">
			<label class="control-label" for="status_id">Status</label>
			<select class="form-control" id="status_id" name="status_id">
			@foreach ($status as $id => $desc)
				<option value="{{ $id }}">{{ $desc }}</option>
				@endforeach
			</select>
			@if ($errors->has('status_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('status_id') }}</strong>
			</span>
			@endif
		</div>
		
		<button type="submit" class="btn btn-success">Cadastrar Usuário</button>
	</fieldset>

	<script>
		function deleteAvatar() {
			document.getElementById('avatar').value = "";
			return true;
		}
	</script>
</form>
@endsection