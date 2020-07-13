@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-primary pull-right" href="{{ route('pessoas.index') }}" role="button">Voltar</a>
	<h2>Editando Pessoas</h2>
</div>

<form action="{{ route('pessoas.update', $pessoa) }}" method="post" encType="multipart/form-data">
	@csrf
	@method('PUT')
	<fieldset>
		
		<div class="form-group @if ($errors->has('nome')) has-error @endif">
			<label class="control-label" for="nome">Nome da Pessoa</label>
			<input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $pessoa->nome) }}">
			@if ($errors->has('nome'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('nome') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('cpf')) has-error @endif">
			<label class="control-label" for="cpf">CPF da Pessoa</label>
			<input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf', $pessoa->cpf) }}">
			@if ($errors->has('cpf'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('cpf') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('rg')) has-error @endif">
			<label class="control-label" for="rg">RG da Pessoa</label>
			<input type="text" class="form-control" id="rg" name="rg" value="{{ old('rg', $pessoa->rg) }}">
			@if ($errors->has('rg'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('rg') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('tipo_id')) has-error @endif">
			<label class="control-label" for="tipo_id">Gênero</label>
			<select class="form-control" id="tipo_id" name="tipo_id">
				@foreach ($tipos as $id => $desc)
				<option value="{{ $id }}" @if($id===$pessoa->tipo_id) selected @endif>{{ $desc }}</option>
				@endforeach
			</select>
			@if ($errors->has('tipo_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('tipo_id') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('status_id')) has-error @endif">
			<label class="control-label" for="status_id">Status</label>
			<select class="form-control" id="status_id" name="status_id">
				@foreach ($status as $id => $desc)
				<option value="{{ $id }}" @if($id===$pessoa->status_id) selected @endif>{{ $desc }}</option>
				@endforeach
			</select>
			@if ($errors->has('status_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('status_id') }}</strong>
			</span>
			@endif
		</div>
		<!--comentario abaixo funciona apenas em blade.php-->
		{{--
		<div class="form-group @if ($errors->has('permission_id')) has-error @endif">
			<label class="control-label" for="permission_id">Tipo de Permissão</label>
			<select class="form-control" id="permission_id" name="permission_id">
				@foreach ($userPermission as $id => $permission)
				<option value="{{ $id }}">{{ $permission }}</option>
				@endforeach
			</select>
			@if ($errors->has('permission_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('permission_id') }}</strong>
			</span>
			@endif
		</div>
		--}}

		<div class="form-group @if ($errors->has('email')) has-error @endif">
			<label class="control-label" for="email">E-mail</label>
			<input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pessoa->email) }}">
			@if ($errors->has('email'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('user_wifi')) has-error @endif">
			<label class="control-label" for="user_wifi">Usuário do WI-FI</label>
			<input type="text" class="form-control" id="user_wifi" name="user_wifi" value="{{ old('user_wifi', $pessoa->user_wifi) }}">
			@if ($errors->has('user_wifi'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('user_wifi') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('pass_wifi')) has-error @endif">
			<label class="control-label" for="pass_wifi">Senha do WI-FI</label>
			<input type="password" class="form-control" id="pass_wifi" name="pass_wifi" value="{{ old('pass_wifi', $pessoa->pass_wifi) }}">
			@if ($errors->has('pass_wifi'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('pass_wifi') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('obs')) has-error @endif">
			<label class="control-label" for="obs">Observações (opcional)</label>
			<input type="text" class="form-control" id="obs" name="obs" value="{{ old('obs', $pessoa->obs) }}">
			@if ($errors->has('obs'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('obs') }}</strong>
			</span>
			@endif
		</div>
		
		<br />
		<button type="submit" class="btn btn-success">Editar Pessoa</button>
	</fieldset>
</form>
@endsection