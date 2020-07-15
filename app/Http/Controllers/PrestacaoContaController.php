<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\EmpresaMembro;
use App\PrestacaoConta;
use App\PrestacaoContaStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestacaoContaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	private function validator(Request $request)
	{
		// validation rules.
		$rules = array(
			'user_id' => 'required|unsignedBigInteger|min(4)|max(10)',
			'empresa_id' => 'required|unsignedBigInteger|max(255)',
			'status_id' => 'required|unsignedBigInteger|max(10)',
			'registro_membros_id' => 'required|unsignedBigInteger|max(10)',
				
			'mes_referencia' => 'required|unsignedBigInteger|min(1)|max(12)',
			'faturamento_bruto' => 'required|double',
			'faturamento_liquido' => 'required|double',
			'custo_operacional' => 'required|double',
			'anexo_dre' => 'string|max(255)',
			'obs' => 'longText|max(999)',
			'qtd_cliente' => 'required|unsignedBigInteger|max(10)',
			'qtd_novos_clientes' => 'required|unsignedBigInteger|max(10)',
			'qtd_perda_clientes' => 'required|unsignedBigInteger|max(10)',
			'cac' => 'required|double',
			'prev_lancamento' => 'required|integer|max(2)',

			'per_vendas' => 'required|integer|max(2)',
			'per_tecnicos' => 'required|integer|max(2)',
			'per_juridicos' => 'required|integer|max(2)',
			'per_pessoas' => 'required|integer|max(2)',
			'per_financeiro' => 'required|integer|max(2)',
			'per_marketing' => 'required|integer|max(2)',
			'per_gestao' => 'required|integer|max(2)',
			'nivel_otimismo' => 'required|integer|max(2)',
			'nivel_interacao' => 'required|integer|max(2)',
			'nivel_satisfacao' => 'required|integer|max(2)',
			'proximos_passos' => 'longText|max(999)',
		);

		// custom validation error messages.
		$messages = array(
			'user_id.required' => 'Por favor informe um usuário válido',
			'empresa_id.required' => 'Por favor informe uma empresa válida',
			'status_id.required' => 'Por favor informe um status válido',
			'registro_membros_id.required' => 'Por favor informe um membro ativo',
				
			'mes_referencia.required' => 'Por favor informe mês de referencia para a prestação de conta',
			'faturamento_bruto.required' => 'Por favor informe o faturamento bruto para a prestação de conta',
			'faturamento_liquido.required' => 'Por favor informe o faturamento líquio para a prestação de conta',
			'custo_operacional.required' => 'Por favor informe o custo operacional do mês para a prestação de conta',
			'qtd_cliente.required' => 'Por favor informe a quantidade de clientes da empresa',
			'qtd_novos_clientes.required' => 'Por favor informe a quantidade de novos clientes no mês',
			'qtd_perda_clientes.required' => 'Por favor informe a quantidade de clientes perdidos no mês',
			'cac.required' => 'Por favor informe o CAC-Custo de aquisição de clientes para a prestação de conta',
			'prev_lancamento' => 'Por favor informe a previção de lançamento da empresa',

			'per_vendas.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Vendas',
			'per_tecnicos.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Técnico',
			'per_juridicos.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Jurídico',
			'per_pessoas.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Pessoas',
			'per_financeiro.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Financeiro',
			'per_marketing.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Marketing',
			'per_gestao.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Gestão',
			'nivel_otimismo.required' => 'Por favor informe o nível de otimismo do seu negócio',
			'nivel_interacao.required' => 'Por favor informe o nível de interação com o colearning SATC',
			'nivel_satisfacao.required' => 'Por favor informe o nível de satisfação com o colearning SATC',
			//'proximos_passos' => 'longText|max(999)',
		);

		$labels = array(
			'user_id' => 'Código Usuário',
			'empresa_id' => 'Código Empresa',
			'status_id' => 'Código Status',
			'registro_membros_id' => 'Código Membros',
				
			'mes_referencia' => 'Mês de Referência',
			'faturamento_bruto' => 'Faturamento Bruto',
			'faturamento_liquido' => 'Faturamento Líquido',
			'custo_operacional' => 'Custo Operacional',
			'anexo_dre' => 'Anexo DRE',
			'obs' => 'Observação',
			'qtd_cliente' => 'Total de Clientes da Empresa',
			'qtd_novos_clientes' => 'Quantidade de Novos Clientes da Empresa',
			'qtd_perda_clientes' => 'Quantidade de Perda de Cliente da Empresa',
			'cac' => 'CAC - Custo Aquisição Clientes',
			'prev_lancamento' => 'Previsão Entrada no Mercado(nº meses)',

			'per_vendas' => 'Nível Percepção de Vendas',
			'per_tecnicos' => 'Nível Percepção Técnico',
			'per_juridicos' => 'Nível Percepção Jurídicos',
			'per_pessoas' => 'Nível Percepção de Pessoas',
			'per_financeiro' => 'Nível Percepção Financeiro',
			'per_marketing' => 'Nível Percepção Marketing',
			'per_gestao' => 'Nível Percepção da Gestão',
			'nivel_otimismo' => 'Nível Otimismo do Negócio',
			'nivel_interacao' => 'Nível Interação Colearning-SATC',
			'nivel_satisfacao' => 'Nível Satisfação Colearning-SATC',
			'proximos_passos' => 'Planejamento - Proximos Passos',
		);

		// validate the request.
		$request->validate($rules, $messages, $labels);
	}

	private function validatorUpdate(Request $request)
	{
		// validation rules.
		$rules = array(
			'user_id' => 'required|unsignedBigInteger|min(4)|max(10)',
			'empresa_id' => 'required|unsignedBigInteger|max(255)',
			'status_id' => 'required|unsignedBigInteger|max(10)',
			'registro_membros_id' => 'required|unsignedBigInteger|max(10)',
				
			'mes_referencia' => 'required|unsignedBigInteger|min(1)|max(12)',
			'faturamento_bruto' => 'required|double',
			'faturamento_liquido' => 'required|double',
			'custo_operacional' => 'required|double',
			'anexo_dre' => 'string|max(255)',
			'obs' => 'longText|max(999)',
			'qtd_cliente' => 'required|unsignedBigInteger|max(10)',
			'qtd_novos_clientes' => 'required|unsignedBigInteger|max(10)',
			'qtd_perda_clientes' => 'required|unsignedBigInteger|max(10)',
			'cac' => 'required|double',
			'prev_lancamento' => 'required|integer|max(2)',

			'per_vendas' => 'required|integer|max(2)',
			'per_tecnicos' => 'required|integer|max(2)',
			'per_juridicos' => 'required|integer|max(2)',
			'per_pessoas' => 'required|integer|max(2)',
			'per_financeiro' => 'required|integer|max(2)',
			'per_marketing' => 'required|integer|max(2)',
			'per_gestao' => 'required|integer|max(2)',
			'nivel_otimismo' => 'required|integer|max(2)',
			'nivel_interacao' => 'required|integer|max(2)',
			'nivel_satisfacao' => 'required|integer|max(2)',
			'proximos_passos' => 'longText|max(999)',
		);

		// custom validation error messages.
		$messages = array(
			'user_id.required' => 'Por favor informe um usuário válido',
			'empresa_id.required' => 'Por favor informe uma empresa válida',
			'status_id.required' => 'Por favor informe um status válido',
			'registro_membros_id.required' => 'Por favor informe um membro ativo',
				
			'mes_referencia.required' => 'Por favor informe mês de referencia para a prestação de conta',
			'faturamento_bruto.required' => 'Por favor informe o faturamento bruto para a prestação de conta',
			'faturamento_liquido.required' => 'Por favor informe o faturamento líquio para a prestação de conta',
			'custo_operacional.required' => 'Por favor informe o custo operacional do mês para a prestação de conta',
			'qtd_cliente.required' => 'Por favor informe a quantidade de clientes da empresa',
			'qtd_novos_clientes.required' => 'Por favor informe a quantidade de novos clientes no mês',
			'qtd_perda_clientes.required' => 'Por favor informe a quantidade de clientes perdidos no mês',
			'cac.required' => 'Por favor informe o CAC-Custo de aquisição de Clientes para a prestação de conta',
			'prev_lancamento' => 'Por favor informe a previção de lançamento da empresa',

			'per_vendas.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Vendas',
			'per_tecnicos.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Técnico',
			'per_juridicos.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Jurídico',
			'per_pessoas.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Pessoas',
			'per_financeiro.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Financeiro',
			'per_marketing.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Marketing',
			'per_gestao.required' => 'Por favor informe a sua percepção quanto ao nível de eficiência operacional - Gestão',
			'nivel_otimismo.required' => 'Por favor informe o nível de otimismo do seu negócio',
			'nivel_interacao.required' => 'Por favor informe o nível de interação com o colearning SATC',
			'nivel_satisfacao.required' => 'Por favor informe o nível de satisfação com o colearning SATC',
		);

		$labels = array(
			'user_id' => 'Código Usuário',
			'empresa_id' => 'Código Empresa',
			'status_id' => 'Código Status',
			'registro_membros_id' => 'Código Membros',
				
			'mes_referencia' => 'Mês de Referência',
			'faturamento_bruto' => 'Faturamento Bruto',
			'faturamento_liquido' => 'Faturamento Líquido',
			'custo_operacional' => 'Custo Operacional',
			'anexo_dre' => 'Anexo DRE',
			'obs' => 'Observação',
			'qtd_cliente' => 'Total de Clientes da Empresa',
			'qtd_novos_clientes' => 'Quantidade de Novos Clientes da Empresa',
			'qtd_perda_clientes' => 'Quantidade de Perda de Cliente da Empresa',
			'cac' => 'CAC - Custo Aquisição Clientes',
			'prev_lancamento' => 'Previsão Entrada no Mercado(nº meses)',

			'per_vendas' => 'Nível Percepção de Vendas',
			'per_tecnicos' => 'Nível Percepção Técnico',
			'per_juridicos' => 'Nível Percepção Jurídicos',
			'per_pessoas' => 'Nível Percepção de Pessoas',
			'per_financeiro' => 'Nível Percepção Financeiro',
			'per_marketing' => 'Nível Percepção Marketing',
			'per_gestao' => 'Nível Percepção da Gestão',
			'nivel_otimismo' => 'Nível Otimismo do Negócio',
			'nivel_interacao' => 'Nível Interação Colearning-SATC',
			'nivel_satisfacao' => 'Nível Satisfação Colearning-SATC',
			'proximos_passos' => 'Planejamento - Proximos Passos',
		);

		$request->validate($rules, $messages, $labels);
	}

	public function index()
	{
		$items = PrestacaoConta::get();
		$empresas = Empresa::pluck('nome_fantasia', 'id');
		$status = PrestacaoContaStatus::pluck('desc_status', 'id');

		return view('prestacaocontas.index', array('items' => $items, 'status' => $status, 'empresa' => $empresas));
	}


	// pendente pegar empresa e buscar o nome
	public function create(Request $request)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		$empresas = Empresa::pluck('nome_fantasia', 'id');
		$status = PrestacaoContaStatus::pluck('desc_status', 'id');
		return view('prestacaocontas.create', array('status' => $status, 'prestacaoMembros'=> $status, 'empresa' => $empresas));
	}

	public function get_membros(Request $request) {
		$prestacaoMembros = EmpresaMembro::pluck('nome_fantasia', 'id')->where('id', $request->empresa_id);
		return view('prestacaocontas.create', array('prestacaoMembros' => $prestacaoMembros));
	}

	public function store(Request $request)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		$prestacaoConta = new PrestacaoConta();

		$prestacaoConta->user_id = $request->user_id;
		$prestacaoConta->empresa_id = $request->empresa_id;
		$prestacaoConta->status_id = $request->status_id;
		$prestacaoConta->registro_membros_id = $request->registro_membros_id;
		$prestacaoConta->user_id = $request->user_id;

		$prestacaoConta->mes_referencia = $request->mes_referencia;
		$prestacaoConta->faturamento_bruto = $request->faturamento_bruto;
		$prestacaoConta->faturamento_liquido = $request->faturamento_liquido;
		$prestacaoConta->custo_operacional = $request->custo_operacional;

		$prestacaoConta->obs = $request->obs;
		$prestacaoConta->qtd_cliente = $request->qtd_cliente;
		$prestacaoConta->qtd_novos_clientes = $request->qtd_novos_clientes;
		$prestacaoConta->qtd_perda_clientes = $request->qtd_perda_clientes;
		$prestacaoConta->cac = $request->cac;
		$prestacaoConta->prev_lancamento = $request->prev_lancamento;

		$prestacaoConta->per_vendas = $request->per_vendas;
		$prestacaoConta->per_tecnicos = $request->per_tecnicos;
		$prestacaoConta->per_juridicos = $request->per_juridicos;
		$prestacaoConta->per_pessoas = $request->per_pessoas;
		$prestacaoConta->per_financeiro = $request->per_financeiro;
		$prestacaoConta->per_marketing = $request->per_marketing;
		$prestacaoConta->per_gestao = $request->per_gestao;
		$prestacaoConta->nivel_otimismo = $request->nivel_otimismo;
		$prestacaoConta->nivel_interacao = $request->nivel_interacao;
		$prestacaoConta->nivel_satisfacao = $request->nivel_satisfacao;
		$prestacaoConta->proximos_passos = $request->proximos_passos;

		if ($request->hasFile('anexo_dre') && $request->file('anexo_dre')->isValid()) 
		{
			$prestacaoConta->anexo_dre = $request->anexo_dre->store('documentos');
		}

		$prestacaoConta->save();

		return redirect()
			->route('prestacaocontas.index')
			->with('success', 'Prestação de contas cadastrada com sucesso!');
	}

	public function show(PrestacaoConta $prestacaoConta)
	{
		$status = PrestacaoContaStatus::pluck('desc_status', 'id');
		return view('prestacaocontas.index', array('PrestacaoConta' => $prestacaoConta, 'status' => $status));
	}

	public function edit(PrestacaoConta $prestacaoConta)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		$status = PrestacaoContaStatus::pluck('desc_status', 'id');
		return view('prestacaocontas.index', array('PrestacaoConta' => $prestacaoConta, 'status' => $status));
	}

	public function update(Request $request, PrestacaoConta $prestacaoConta)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		$prestacaoConta->user_id = $request->user_id;
		$prestacaoConta->empresa_id = $request->empresa_id;
		$prestacaoConta->status_id = $request->status_id;
		$prestacaoConta->registro_membros_id = $request->registro_membros_id;
		$prestacaoConta->user_id = $request->user_id;
		$prestacaoConta->mes_referencia = $request->mes_referencia;
		$prestacaoConta->faturamento_bruto = $request->faturamento_bruto;
		$prestacaoConta->faturamento_liquido = $request->faturamento_liquido;
		$prestacaoConta->custo_operacional = $request->custo_operacional;
		$prestacaoConta->obs = $request->obs;
		$prestacaoConta->qtd_cliente = $request->qtd_cliente;
		$prestacaoConta->qtd_novos_clientes = $request->qtd_novos_clientes;
		$prestacaoConta->qtd_perda_clientes = $request->qtd_perda_clientes;
		$prestacaoConta->cac = $request->cac;
		$prestacaoConta->prev_lancamento = $request->prev_lancamento;
		$prestacaoConta->per_vendas = $request->per_vendas;
		$prestacaoConta->per_tecnicos = $request->per_tecnicos;
		$prestacaoConta->per_juridicos = $request->per_juridicos;
		$prestacaoConta->per_pessoas = $request->per_pessoas;
		$prestacaoConta->per_financeiro = $request->per_financeiro;
		$prestacaoConta->per_marketing = $request->per_marketing;
		$prestacaoConta->per_gestao = $request->per_gestao;
		$prestacaoConta->nivel_otimismo = $request->nivel_otimismo;
		$prestacaoConta->nivel_interacao = $request->nivel_interacao;
		$prestacaoConta->nivel_satisfacao = $request->nivel_satisfacao;
		$prestacaoConta->proximos_passos = $request->proximos_passos;

		if ($request->hasFile('anexo_dre') && $request->file('anexo_dre')->isValid()) 
		{
			$prestacaoConta->anexo_dre = $request->anexo_dre->store('documentos');
		}

		$prestacaoConta->save();

		return redirect()
			->route('prestacaocontas.index')
			->with('success', 'Prestação de contas alterada com sucesso!');
	}

	public function destroy(PrestacaoConta $prestacaoConta)
	{

		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		if (!empty($prestacaoConta->anexo_dre)) {
			Storage::delete($prestacaoConta->anexo_dre);
			$prestacaoConta->anexo_dre = null;
			$prestacaoConta->save();
		 }
		 

		$prestacaoConta->delete();

		return redirect()
			->route('prestacaocontas.index')
			->with('success', 'Prestação de contas deletada com sucesso!');
	}

	public function destroy_anexo_dre(PrestacaoConta $prestacaoConta)
	{
		$permission = Auth::guard()->user()->permission_id;
		if (($permission != 1) && ($permission != 3)) {
			return redirect()->back()->with('error', 'Permissão negada.');
		}

		if (!empty($prestacaoConta->anexo_dre)) {
		  Storage::delete($prestacaoConta->anexo_dre);
		  $prestacaoConta->anexo_dre = null;
		  $prestacaoConta->save();
	   }
	   return redirect()->back();
	}
}
