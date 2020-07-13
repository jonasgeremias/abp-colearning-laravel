<?php

namespace App\Http\Controllers;

use App\User;
use App\UserPermission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
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
			'password' => 'required|string|min:5|confirmed',
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

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$items = User::get();
		$permissions = UserPermission::pluck('desc_permission', 'id');

		return view('users.index', array('items' => $items, 'userPermission' => $permissions));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$permissions = UserPermission::pluck('desc_permission', 'id');
		return view('users.create', array('userPermission' => $permissions));
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

		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->permission_id = $request->permission_id;
		$user->password = Hash::make($request->password);

		if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
			$user->avatar = $request->avatar->store('users');
		}

		$user->save();

		return redirect()
			->route('users.index')
			->with('success', 'Usuário cadastrado com sucesso!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		$permissions = UserPermission::pluck('desc_permission', 'id');
		return view('users.show', array('user' => $user, 'userPermission' => $permissions));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		$permissions = UserPermission::pluck('desc_permission', 'id');
		return view('users.edit', array('user' => $user, 'userPermission' => $permissions));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		$this->validatorUpdate($request);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->permission_id = $request->permission_id;
		if (!empty($request->password)) {
			$user->password = Hash::make($request->password);
		}

		if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
			$user->avatar = $request->avatar->store('users');
		}


		$user->save();

		return redirect()
			->route('users.index')
			->with('success', 'Usuário alterado com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		Storage::delete($user->avatar);
		$user->delete();

		return redirect()
			->route('users.index')
			->with('success', 'Usuário deletado com sucesso!');
	}

	public function destroy_foto(User $user)
	{
		dump($user);
		
		if (!empty($user->avatar)) {
			Storage::delete($user->avatar);
			$user->avatar = null;
			$user->save();
		}

		return redirect()->back();
	}
}
