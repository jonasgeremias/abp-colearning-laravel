@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-primary pull-right" href="{{ route('users.index') }}" role="button">Voltar</a>
	<h2>Novo Usuário do Sistema</h2>
</div>

<form action="{{ route('users.store') }}" method="post">
	@csrf
	<fieldset>
		<div class="form-group @if ($errors->has('avatar')) has-error @endif">
			<label class="control-label" for="avatar">Foto do usuário</label>
			<input onclick="this.value=null" onchange="" type="file" id="avatar" name="avatar" class="form-control btn btn-primary" accept="image/png, image/jpeg" />
			@if ($errors->has('avatar'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('avatar') }}</strong>
			</span>
			@endif
		</div>

		<div style="display: flex;flex-direction: column;justify-content: center;">
		<p>
			<img class='avatar' id='img_avatar' style="width: 150px;height: 150px;" src="" alt="" />
			<button type="button" onclick="deleteAvatar()" class="btn btn-default btn-sm">Excluir Foto</button>
		</p>
		</div>

		<div class="form-group @if ($errors->has('name')) has-error @endif">
			<label class="control-label" for="name">Nome do Usuário</label>
			<input type="text" class="form-control" id="name" name="name">
			@if ($errors->has('name'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>

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

		<div class="form-group @if ($errors->has('email')) has-error @endif">
			<label class="control-label" for="email">E-mail de Acesso</label>
			<input type="email" class="form-control" id="email" name="email">
			@if ($errors->has('email'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('password')) has-error @endif">
			<label class="control-label" for="password">Senha de Acesso</label>
			<input type="password" class="form-control" id="password" name="password">
			@if ($errors->has('password'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group">
			<label class="control-label" for="password_confirmation">Repita a Senha</label>
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
		</div>
		<br />
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