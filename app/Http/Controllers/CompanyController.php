<?php

namespace App\Http\Controllers;

use App\Empresa;
//use App\User;
use App\EmpresaStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CompanyController extends Controller
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

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$items = Empresa::get();
		$status = EmpresaStatus::pluck('desc_status', 'id');

		return view('company.index', array('items' => $items, 'status' => $status));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
		$status = EmpresaStatus::pluck('desc_status', 'id');

		return view('company.create', array('status' => $status));
		
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//$this->validator($request);

		$empresa = new Empresa();
		$empresa->nome_fantasia = $request->nome_fantasia;
		$empresa->razao_social = $request->razao_social;
		$empresa->cnpj = $request->cnpj;
		$empresa->part_satc = $request->part_satc;
		$empresa->nome_ceo = $request->nome_ceo;
		$empresa->email = $request->email;
		$empresa->data_inicio_contrato = $request->data_inicio_contrato;
		$empresa->data_vigencia_1 = $request->data_vigencia_1;
		$empresa->data_vigencia_2 = $request->data_vigencia_2;
		//$empresa->anexo_cont_social = $request->anexo_cont_social;
		//$empresa->anexo_cont_incub = $request->anexo_cont_incub;
		//$empresa->anexo_adit_incub = $request->anexo_adit_incub;
		$empresa->obs = $request->obs;
		$empresa->status_id = $request->status_id;

		if ($request->hasFile('anexo_cont_social') && $request->file('anexo_cont_social')->isValid()) {
			$empresa->anexo_cont_social = $request->anexo_cont_social->store('documentos');
		}

		if ($request->hasFile('anexo_cont_incub') && $request->file('anexo_cont_incub')->isValid()) {
			$empresa->anexo_cont_incub = $request->anexo_cont_incub->store('documentos');
		}

		if ($request->hasFile('anexo_adit_incub') && $request->file('anexo_adit_incub')->isValid()) {
			$empresa->anexo_adit_incub = $request->anexo_adit_incub->store('documentos');
		}

				$empresa->save();

		return redirect()
			->route('company.index')
			->with('success', 'Empresa cadastrado com sucesso!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(Empresa $company)
	{
		$status = EmpresaStatus::pluck('desc_status', 'id');
		return view('company.show', array('company' => $company, 'status' => $status));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Empresa $company)
	{
		
		$status = EmpresaStatus::pluck('desc_status', 'id');
		return view('company.edit', array('company' => $company, 'status' => $status));
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Empresa $company)
	{
		//$this->validatorUpdate($request);

		//$empresa = new Empresa();
		$company->nome_fantasia = $request->nome_fantasia;
		$company->razao_social = $request->razao_social;
		$company->cnpj = $request->cnpj;
		$company->part_satc = $request->part_satc;
		$company->nome_ceo = $request->nome_ceo;
		$company->email = $request->email;
		$company->data_inicio_contrato = $request->data_inicio_contrato;
		$company->data_vigencia_1 = $request->data_vigencia_1;
		$company->data_vigencia_2 = $request->data_vigencia_2;
		//$company->anexo_cont_social = $request->anexo_cont_social;
		//$company->anexo_cont_incub = $request->anexo_cont_incub;
		//$company->anexo_adit_incub = $request->anexo_adit_incub;
		$company->obs = $request->obs;
		$company->status_id = $request->status_id;
		

		if ($request->hasFile('anexo_cont_social') && $request->file('anexo_cont_social')->isValid()) {
			$company->anexo_cont_social = $request->anexo_cont_social->store('documentos');
		}

		if ($request->hasFile('anexo_cont_incub') && $request->file('anexo_cont_incub')->isValid()) {
			$company->anexo_cont_incub = $request->anexo_cont_incub->store('documentos');
		}

		if ($request->hasFile('anexo_adit_incub') && $request->file('anexo_adit_incub')->isValid()) {
			$company->anexo_adit_incub = $request->anexo_adit_incub->store('documentos');
		}

		$company->save();

		return redirect()
			->route('company.index')
			->with('success', 'Empresa alterada com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Empresa $company)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		if (!empty($company->anexo_adit_incub)) {
			Storage::delete($company->anexo_adit_incub);
			$company->anexo_adit_incub = null;
			$company->save();
		 }
		 if (!empty($company->anexo_cont_social)) {
			Storage::delete($company->anexo_cont_social);
			$company->anexo_cont_social = null;
			$company->save();
		 }
		 if (!empty($company->anexo_cont_incub)) {
			Storage::delete($company->anexo_cont_incub);
			$company->anexo_cont_incub = null;
			$company->save();
		 }

		$company->delete();

		return redirect()
			->route('company.index')
			->with('success', 'Usuário deletado com sucesso!');
	}


	public function destroy_anexo_cont_social(Empresa $company)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		if (!empty($company->anexo_cont_social)) {
		  Storage::delete($company->anexo_cont_social);
		  $company->anexo_cont_social = null;
		  $company->save();
	   }
	   return redirect()->back();
	}
	
	public function destroy_anexo_cont_incub(Empresa $company)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		if (!empty($company->anexo_cont_incub)) {
		  Storage::delete($company->anexo_cont_incub);
		  $company->anexo_cont_incub = null;
		  $company->save();
	   }
	   return redirect()->back();
	}
	
	public function destroy_anexo_adit_incub(Empresa $company)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}
		
		if (!empty($company->anexo_adit_incub)) {
		  Storage::delete($company->anexo_adit_incub);
		  $company->anexo_adit_incub = null;
		  $company->save();
	   }
	   return redirect()->back();
	}



}
