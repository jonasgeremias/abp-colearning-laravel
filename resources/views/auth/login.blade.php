@extends('layouts.default')

@section('content')

<div class="container vertical-align">
	<div class="row">
		<div class="col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2 justify-content-center ">
			<div class="panel panel-primary" style="margin-top: 50px;">
				<div class="text-center panel-heading">
					<h3 class="h3">{{ __('Login') }}</h3>
				</div>
				<div class="panel-body">
					<div class="col-12">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group">
							<label for="email" class="col-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
							<div class="col-8">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="col-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-8">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-12">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>

						<div class="col-12">
								<button type="submit" class="btn btn-primary col-12">
									{{ __('Login') }}
								</button>
							
								@if (Route::has('password.request'))
								<a class="btn btn-link col-12" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
								@endif
						</div>

					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection