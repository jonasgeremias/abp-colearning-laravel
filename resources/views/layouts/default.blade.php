<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portal Colearning</title>
	<link rel='icon' type='image/x-icon' href="{{ asset('/images/logo-colearning.png') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('/css/default.css') }}">

	<style>
		html {
			min-width: 1000px !important;
		}

		.navbar-brand {
			padding: 5px;
		}
		footer p {
			font-weight: bold
		}

		hr {
			border-top: 2px solid #333;
		}

		#user-avatar {
			display: flex;
			align-items: center;
		}

		.avatar {
			vertical-align: middle;
			border-radius: 50%;
		}
	</style>

</head>

<body>
	<div class="container">
		<!-- Static navbar -->
		@if(Auth::check())
		<nav class="navbar navbar-default bg-default">
			<a class="navbar-brand" href="#">
				<img id='nav-logo' src="{{asset('/images/logo-colearning.png')}}" alt="Colearning" width="auto" height="35">
			</a>
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a class='nav-item' href="{{ route('home') }}">Home</a></li>
						@if(Auth::guard()->user()->permission_id == 1)
						<li><a class='nav-item' href="{{ route('users.index') }}">Usuários</a></li>
						@endif
						<li><a class='nav-item' href="{{ route('pessoas.index') }}">Pessoas</a></li>
						<li role="presentation">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								Empresas <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a class='nav-item' href="{{ route('company.index') }}">Cadastro</a></li>
								<li><a class='nav-item' href="{{ route('membros.index') }}">Membros</a></li>
								<li><a class='nav-item' href="{{ route('prestacaocontas.index') }}">Prestacao de contas</a></li>
							</ul>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<!-- Split button -->

						<li role="presentation">
							<a class="" id="user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								@if(Auth::guard()->user()->avatar)
								<img class="avatar" style="width: 32px;height: 32px;" src="{{ asset('storage/' . Auth::guard()->user()->avatar) }}" alt="{{ Auth::guard()->user()->name }}" /></p>
								@else
								Usuário <span class="caret"></span>
								@endif
							</a>
							<ul class="dropdown-menu">
								<!-- <li><a class='nav-item' href='#'> Bem vindo <b>{{Auth::guard()->user()->name }}</b>.</a></li> -->
								<li><a class='nav-item' href="{{ url('/logout') }}">Sair / Logout</a></li>
							</ul>
						</li>

					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>
		@endif

		{{-- Info Alert --}}
		@if(session('status'))
		<div class="top-alert alert alert-info alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{session('status')}}
		</div>
		@endif

		{{-- Success Alert --}}
		@if(session('success'))
		<div class="top-alert alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{session('success')}}
		</div>
		@endif

		{{-- Error Alert --}}
		@if(session('error'))
		<div class="top-alert alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{session('error')}}
		</div>
		@endif

		<main style='min-height: 650px;'>
			@yield('content')
		</main>

		<hr>

		<footer>
			<p>&copy; {{ date("Y") }} Eng. Comp. SATC - Colearning</p>
		</footer>
	</div>
	<!-- /container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- nosso código no de baixo -->
	<script type="text/javascript" src="{{ asset('/js/default.js') }}"></script>
</body>

</html>