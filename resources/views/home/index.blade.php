@extends("layouts.default")

@section("content")

<div class="jumbotron">
	<h1>Bem-vindo {{ Auth::guard()->user()->name }}</h1>
	<p>Utilize o menu acima para acessar o módulo desejado</p>
</div>

@endsection