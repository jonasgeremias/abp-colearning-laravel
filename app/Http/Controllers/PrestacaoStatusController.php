<?php

namespace App\Http\Controllers;

use App\PrestacaoContaStatus;
use Illuminate\Http\Request;

class PrestaçãoStatusPermissionController extends Controller
{

	private function validator(Request $request)
	{
		$rules = array(
			'desc_status' => 'required|string|max:255',
		);

		$messages = array(
			'desc_status.required' => 'Por favor informe o status da prestação de contas.'
		);

		$labels = array(
			"desc_status" => "desc_status",
		);

		$request->validate($rules, $messages, $labels);
	}

	public function index()
	{
	}

	public function create()
	{
	}

	public function store(Request $request)
	{
	}

	public function show(PrestacaoContastatus $prestacaoContaStatus)
	{
	}

	public function edit(PrestacaoContaStatus $prestacaoContaStatus)
	{
	}

	public function update(Request $request, PrestacaoContaStatus $prestacaoContaStatus)
	{
	}

	public function destroy(PrestacaoContaStatus $prestacaoContaStatus)
	{
	}
}
