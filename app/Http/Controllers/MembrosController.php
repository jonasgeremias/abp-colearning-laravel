<?php

namespace App\Http\Controllers;

use App\Membro;
use App\MembroTipo;
use App\MembroStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MembrosController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	private function validator(Request $request)
	{
		// validation rules.
		$rules = array(
			'pessoa_id' => 'required|unsignedBigInteger|max:255',
			'empresa_id' => 'required|unsignedBigInteger|max:255',
			'funcao_membro_id' => 'required|unsignedBigInteger|max:14',
			'user_id' => 'required|unsignedBigInteger|min:4|max:10',			
			'data_inicio' => 'required|date|max:10',
			'data_vigencia' => 'required|date|max:10',
			'anexo_documentos' => 'string|nullable',
			'anexo_contratos' => 'string|nullable',
			'status_id' => 'required|unsignedBigInteger|max:10',
		);

		// custom validation error messages.

		$messages = array(
			'pessoa_id' => '()',
			'empresa_id' => '()',
			'funcao_membro_id' => 'Por favor informe uma função válida',
			'user_id' => 'Por favor informe um nome de usuário válido',			
			'data_inicio' => 'Por favor informe uma data válida',
			'data_vigencia' => 'Por favor informe uma data válida',
			'anexo_documentos' => '',
			'anexo_contratos' => '',
			'status_id' => 'Por favor selecione uma opção válida',
		);

		$labels = array(		
		    "pessoa_id" => "Código do Membro",
			"empresa_id" => "Código da Empresa",
			"funcao_membro_id" => "Função",
			"user_id" => "Usuário",		
			"data_inicio" => "Data Início",
			"data_vigencia" => "Data Vigência",
			"anexo_documentos" => "Documentos (opcional)",
			"anexo_contratos" => "Contrato",
			"status_id" => "Status",
		);

		// validate the request.
		$request->validate($rules, $messages, $labels);
	}


	public function index()
	{
		$items = Membro::get();
		$status = MembroStatus::pluck('desc_status', 'id');

		return view('membros.index',['items'=>$items, 'status'=>$status]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$tipos = MembroTipo::pluck('desc_tipo', 'id');
		$status = MembroStatus::pluck('desc_status', 'id');
		return view('membros.create',['tipos'=>$tipos,'status'=>$status]);
		
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

		$membro = new Membro();
		$membro->pessoa_id = $request->pessoa_id;
		$membro->empresa_id = $request->empresa_id;
		$membro->funcao_membro_id = $request->funcao_membro_id;
		$membro->user_id = $request->user_id;
		$membro->data_inicio = $request->data_inicio;
		$membro->data_vigencia = $request->data_vigencia;
		$membro->anexo_documentos = $request->anexo_documentos;
		$membro->anexo_contratos = $request->anexo_contratos;
		$membro->status_id = $request->status_id;
		$membro->save();

		return redirect()
			->route('membros.index')
			->with('success', 'Membro cadastrado com sucesso!');
	}

	public function show(Membro $membro)
	{		
		return view('membros.show', array('membro' => $membro));		
	}

	public function edit(Membro $membro)
	{
		$tipos = MembroTipo::pluck('desc_tipo', 'id');
		$status = MembroStatus::pluck('desc_status', 'id');
		return view('membros.edit', array('membro' => $membro,'tipos'=>$tipos, 'status'=>$status));
		
	}

	public function update(Request $request, Membro $membro)
	{
		
		$this->validator($request);

		$membro = new Membro();
		$membro->pessoa_id = $request->pessoa_id;
		$membro->empresa_id = $request->empresa_id;
		$membro->funcao_membro_id = $request->funcao_membro_id;
		$membro->user_id = $request->user_id;
		$membro->data_inicio = $request->data_inicio;
		$membro->data_vigencia = $request->data_vigencia;
		$membro->anexo_documentos = $request->anexo_documentos;
		$membro->anexo_contratos = $request->anexo_contratos;
		$membro->status_id = $request->status_id;
		$membro->save();

		return redirect()
			->route('membros.index')
			->with('success', 'Membro editado com sucesso!');
			
	}

	public function destroy(Membro $membro)
	{
		
		$membro->delete();

		return redirect()
			->route('membros.index')
			->with('success', 'Membro deletado com sucesso!');
			
	}

}
