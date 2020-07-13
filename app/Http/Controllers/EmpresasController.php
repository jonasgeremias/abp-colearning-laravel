<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\UserPermission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	private function validator(Request $request)
	{
		// validation rules.
		$rules = array(
			'name' => 'required|string|max:255',
			'email' => 'required|email|string|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
		);

		// custom validation error messages.
		$messages = array(
			'name.required' => 'Por favor informe um nome de usuário válido',
			'email.required' => 'Por favor informe um e-mail de usuário válido',
			'email.email' => 'Por favor informe um e-mail de usuário válido',
			'email.unique' => 'Este usuário já se encontra em uso',
			'password.confirmed' => 'Confirme a repetição de senha correta',
		);

		$labels = array(
			"name" => "nome",
			"email" => "e-mail",
			"password" => "senha",
		);

		// validate the request.
		$request->validate($rules, $messages, $labels);
	}

	private function validatorUpdate(Request $request)
	{
		// validation rules.
		$rules = array(
			'name' => 'required|string|max:255',
			'email' => 'required|email|string|max:255',
			'password' => 'confirmed',
		);

		// custom validation error messages.
		$messages = array(
			'name.required' => 'Por favor informe um nome de usuário válido',
			'email.required' => 'Por favor informe um e-mail de usuário válido',
			'email.email' => 'Por favor informe um e-mail de usuário válido',
			'email.unique' => 'Este usuário já se encontra em uso',
			'password.confirmed' => 'Confirme a repetição de senha correta',
		);

		$labels = array(
			"name" => "nome",
			"email" => "e-mail",
			"password" => "senha",
		);

		// validate the request.
		$request->validate($rules, $messages, $labels);
	}

	public function index()
	{
		$items = Empresa::get();
		//$permissions = UserPermission::pluck('desc_permission', 'id');

		return view('empresas.index', array('items' => $items));
	}

	public function create()
	{
		//$permissions = UserPermission::pluck('desc_permission', 'id');
		return view('empresas.create'); //, array('userPermission' => $permissions));
	}

	public function store(Request $request)
	{
		/*
		$this->validator($request);

		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->permission_id = $request->permission_id;
		$user->password = Hash::make($request->password);

		if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
			$user->avatar = $request->avatar->store('users');
		}

		$user->save();
		*/
		return redirect()
			->route('users.index')
			->with('success', 'Usuário cadastrado com sucesso!');
	}

	public function show(Empresa $empresa)
	{
		//$permissions = UserPermission::pluck('desc_permission', 'id');
		return view('users.show'); //, array('user' => $user, 'userPermission' => $permissions));
	}

	public function edit(Empresa $empresa)
	{
		//$permissions = UserPermission::pluck('desc_permission', 'id');
		return view('users.edit'); //, array('user' => $user, 'userPermission' => $permissions));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Empresa $empresa)
	{
		/*$this->validatorUpdate($request);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->permission_id = $request->permission_id;
		if (!empty($request->password)) {
			$user->password = Hash::make($request->password);
		}

		if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
			$user->avatar = $request->avatar->store('users');
		}


		$user->save();*/

		return redirect()
			->route('empresa.index')
			->with('success', 'Usuário alterado com sucesso!');
	}

	public function destroy(Empresa $empresa)
	{
		//Storage::delete($empresa->avatar);
		//$empresa->delete();

		return redirect()
			->route('empresa.index')
			->with('success', 'Usuário deletado com sucesso!');
	}

	public function destroy_foto(Empresa $empresa)
	{
		/*dump($user);
		
		if (!empty($user->avatar)) {
			Storage::delete($user->avatar);
			$user->avatar = null;
			$user->save();
		}*/

		return redirect()->back();
	}
}
