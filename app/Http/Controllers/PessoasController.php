<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\PessoaTipo;
use App\PessoaStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	private function validator(Request $request)
	{
		// validation rules.
		$rules = array(
			'nome' => 'required|string|max:255',
			'email' => 'required|email|string|max:255',
			'cpf' => 'required|string|max:14',
			'rg' => 'required|string|max:15',			
		);

		// custom validation error messages.
		$messages = array(
			'nome.required' => 'Por favor informe um nome válido',
			'email.required' => 'Por favor informe um e-mail válido',
			'email.email' => 'Por favor informe um e-mail válido',
			'email.unique' => 'Este usuário já se encontra em uso',
			'cpf.required' => 'Por favor informe um CPF válido',
			'rg.required' => 'Por favor informe um RG válido',
		);

		$labels = array(
			"nome" => "nome",
			"email" => "e-mail",
			"cpf" => "CPF",
			"rg" => "RG",
		);

		// validate the request.
		$request->validate($rules, $messages, $labels);
	}


	public function index()
	{
		$items = Pessoa::get();
		$status = PessoaStatus::pluck('desc_status', 'id');

		return view('pessoas.index',['items'=>$items, 'status'=>$status]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$tipos = PessoaTipo::pluck('desc_tipo', 'id');
		$status = PessoaStatus::pluck('desc_status', 'id');
		return view('pessoas.create',['tipos'=>$tipos,'status'=>$status]);
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validator($request);

		$pessoa = new Pessoa();
		$pessoa->nome = $request->nome;
		$pessoa->cpf = $request->cpf;
		$pessoa->rg = $request->rg;
		$pessoa->email = $request->email;
		$pessoa->tipo_id = $request->tipo_id;
		$pessoa->status_id = $request->status_id;
		$pessoa->user_wifi = $request->user_wifi;
		$pessoa->pass_wifi = $request->pass_wifi;
		$pessoa->obs = $request->obs;
		$pessoa->save();

		return redirect()
			->route('pessoas.index')
			->with('success', 'Pessoa cadastrada com sucesso!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(Pessoa $pessoa)
	{
		$tipos = PessoaTipo::pluck('desc_tipo', 'id');
		$status = PessoaStatus::pluck('desc_status', 'id');
		return view('pessoas.show', array('pessoa' => $pessoa,'tipos'=>$tipos, 'status'=>$status));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Pessoa $pessoa)
	{
		$tipos = PessoaTipo::pluck('desc_tipo', 'id');
		$status = PessoaStatus::pluck('desc_status', 'id');
		return view('pessoas.edit', array('pessoa' => $pessoa,'tipos'=>$tipos, 'status'=>$status));
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Pessoa $pessoa)
	{
		
		$this->validator($request);

		$pessoa->nome = $request->nome;
		$pessoa->cpf = $request->cpf;
		$pessoa->rg = $request->rg;
		$pessoa->email = $request->email;
		$pessoa->tipo_id = $request->tipo_id;
		$pessoa->status_id = $request->status_id;
		$pessoa->user_wifi = $request->user_wifi;
		$pessoa->pass_wifi = $request->pass_wifi;
		$pessoa->obs = $request->obs;
		$pessoa->save();

		return redirect()
			->route('pessoas.index')
			->with('success', 'Pessoa editada com sucesso!');

			
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Pessoa $pessoa)
	{
		
		$pessoa->delete();

		return redirect()
			->route('pessoas.index')
			->with('success', 'Pesssoa deletada com sucesso!');
			
	}

}
