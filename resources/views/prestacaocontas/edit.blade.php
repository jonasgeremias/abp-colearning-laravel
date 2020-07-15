@extends('layouts.default')

@section('content')
<div class="page-header">
	<a class="btn btn-primary pull-right" href="{{ route('prestacaocontas.index') }}" role="button">Voltar</a>
	<h2>Editando Prestação de Contas</h2>
</div>

<form action="{{ route('prestacaocontas.update', $prestacao) }}" method="post" encType="multipart/form-data">
	@csrf
	@method('PUT')
	<fieldset>

		<div class="form-group @if ($errors->has('id')) has-error @endif">
			<label class="control-label" for="id">Código da Prestação de Conta</label>
			<input type="text" class="form-control" id="id" name="id" value='{{ old("id", $prestacao->id) }}' disabled>
			@if ($errors->has('id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('id') }}</strong>
			</span>
			@endif
		</div>

		<!-- Aqui tem que ter função para pegar o id do usuário logado -->
		<div class="form-group @if ($errors->has('user_id')) has-error @endif">
			<label class="control-label" for="user_id">Usuário</label>
			<select class="form-control" id="user_id" name="user_id">
				<!-- @foreach ($prestacaoUserId as $id => userid)
				<option value="{{ $id }}" @if($id===$prestacao->user_id) selected @endif>{{ $userid }}</option>
				@endforeach -->
			</select>
			@if ($errors->has('user_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('user_id') }}</strong>
			</span>
			@endif
		</div>

		<!-- gerar automatico qdo usuário(salvar editar, até estar em análise) e admin pode midificar STATUS = 1 Aprovada / 2 Reprovada / 3 Em análise / 4 Incompleta -->
		<div class="form-group @if ($errors->has('status_id')) has-error @endif">
			<label class="control-label" for="status_id">Status</label>
			<select class="form-control" id="status_id" name="status_id">
				<!--@foreach ($prestacaoStatusId as $id => statusid)
				<option value="{{ $id }}" @if($id===$prestacao->status_id) selected @endif>{{ $statusid }}</option>
				@endforeach-->
			</select>
			@if ($errors->has('status_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('status_id') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('registro_membros_id')) has-error @endif">
			<label class="control-label" for="registro_membros_id">Status</label>
			<select type="text" class="form-control" id="registro_membros_id" name="registro_membros_id">
				<!--@foreach ($prestacaoMembrosId as $id => membrosid)
				<option value="{{ $id }}" @if($id===$prestacao->registro_membros_id) selected @endif>{{ $membrosid }}</option>
				@endforeach-->
			</select>
			@if ($errors->has('registro_membros_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('registro_membros_id') }}</strong>
			</span>
			@endif
		</div>

		<hr>
		<h3> Questionário </h3>
		<hr>

		<div class="form-group @if ($errors->has('empresa_id')) has-error @endif">
			<label class="control-label" for="empresa_id">1 - Qual o nome da sua empresa?</label>
			<select class="form-control" id="empresa_id" name="empresa_id">
				@foreach ($prestacaoEmpresaId as $id => empresaid)
				<option value="{{ $id }}" @if($id===$prestacao->empresa_id) selected @endif>{{ $empresaid }}</option>
				@endforeach
			</select>
			@if ($errors->has('empresa_id'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('empresa_id') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group @if ($errors->has('mes_referencia')) has-error @endif">
			<label type="text" min="1" max="12" class="control-label" for="mes_referencia">2 - Qual o mês da prestação de contas?*</label>
			<p>*Informe um número de 1 a 12 para: 1-Janeiro / 2-Fevereiro / 3-Março / 4-Abril / 5-Maio / 6-Junho / 7-Julho / 8-Agosto / 9-Setembro / 10-Outubro / 11-Novembro / 12-Dezembro</p>
			<input type="text" class="form-control" id="mes_referencia" name="mes_referencia" value="{{ old("mes_referencia", $prestacao->mes_referencia) }}">
			@if ($errors->has('mes_referencia'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('mes_referencia') }}</strong>
			</span>
			@endif
		</div>

		<hr>
		<h3> Prestação de Contas </h3>
		<p> Nesta seção será feita a prestação de contas mensal. Caso não haja faturamento anexe apenas a DRE de sua empresa. Caso não possua a DRE (apenas MEI ou sem CNPJ) para prestar contas apenas preencha e assine a declaração do link www.XXX.com e anexe no item 6 (em PDF).</p>
		<hr>

		<div class="form-group @if ($errors->has('faturamento_bruto')) has-error @endif">
			<label class="control-label" for="faturamento_bruto">3 - Qual o Faturamento Bruto do mês corrente?</label>
			<p>* O faturamento bruto de uma empresa é tudo aquilo que ela arrecadou em suas vendas e
			serviços prestados. (Responda apenas com números 00,00 e não utilize ponto, apenas virgula)</p>
			<input type="text" step="0.01" class="form-control" id="faturamento_bruto" name="faturamento_bruto" value="{{ old("faturamento_bruto", $prestacao->faturamento_bruto) }}">
			@if ($errors->has('faturamento_bruto'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('faturamento_bruto') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group @if ($errors->has('faturamento_liquido')) has-error @endif">
			<label class="control-label" for="faturamento_liquido">4 - Qual o Faturamento Líquido do mês corrente?*</label>
			<p>* Faturamento líquido é o total do faturamento, deduzidos dos impostos que incidem sobre a venda. (Responda apenas com números 00,00 e não utilize ponto, apenas virgula)</p>
			<input type="text" step="0.01" class="form-control" id="faturamento_liquido" name="faturamento_liquido" value="{{ old("faturamento_liquido", $prestacao->faturamento_liquido) }}">
			@if ($errors->has('faturamento_liquido'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('faturamento_liquido') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group @if ($errors->has('custo_operacional')) has-error @endif">
			<label class="control-label" for="custo_operacional">5 - Qual foi o custo operacional do mês?*</label>
			<p>* Faça uma soma dos custos econômico e financeiro da operação Custo econômico (são custos indiretos e intangíveis, ex.: custo de horas de trabalho). Custo financeiro (é o quanto de dinheiro foi gasto). (Responda apenas com números 00,00 e não utilize ponto, apenas virgula)</p>
			<input type="text" class="form-control" id="custo_operacional" name="custo_operacional" value="{{ old("custo_operacional", $prestacao->custo_operacional) }}">
			@if ($errors->has('custo_operacional'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('custo_operacional') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<!--
		<div class="form-group @if ($errors->has('anexo_dre')) has-error @endif">
			<label class="control-label" for="anexo_dre">6 Anexe aqui sua demonstração do resultado do exercício e todas as notas fiscais emitidas, em um mesmo arquivo, seguindo o padrão de nomenclatura "[NomeEmpresa]_[Mês].[Ano]_NFe[NumeroInicio]-[NumeroFinal]"*   </label>
			<p>* Ex.: Colearning_Janeiro.2020_NFe3-7 * Para adicionar um arquivo compilando com o DRE e todas as notas é fácil é só colocar no https://www.ilovepdf.com/pt (https://www.ilovepdf.com/pt) e juntar tudo. Anexe a DRE na primeira pagina e as NFe em sequencia</p>
			<input type="text" class="form-control" id="anexo_dre" name="anexo_dre" value="{{ old("anexo_dre", $prestacao->anexo_dre) }}">
			@if ($errors->has('anexo_dre'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('anexo_dre') }}</strong>
			</span>
			@endif
		</div> -->
		<div class="form-group">
			<p>6 - Anexe aqui sua demonstração do resultado do exercício e todas as notas fiscais emitidas, em um mesmo arquivo, seguindo o padrão de nomenclatura "[NomeEmpresa]_[Mês].[Ano]_NFe[NumeroInicio]-[NumeroFinal]"</p>
			<p>Ex.: Colearning_Janeiro.2020_NFe3-7 * Para adicionar um arquivo compilando com o DRE e todas as notas é fácil é só colocar no https://www.ilovepdf.com/pt (https://www.ilovepdf.com/pt) e juntar tudo. Anexe a DRE na primeira pagina e as NFe em sequencia</p>
		</div>
		<div class="form-group @if ($errors->has('anexo_dre')) has-error @endif">
			<label class="control-label" for="anexo_dre"> 6 - Anexo DRE </label>
			<input onclick="this.value=null" onchange="" type="file" id="anexo_dre" name="anexo_dre" class="form-control btn btn-primary" accept="application/pdf" />
			@if ($errors->has('anexo_dre'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('anexo_dre') }}</strong>
			</span>
			@endif
		</div>

		<div style="display: flex;flex-direction: column;justify-content: center;">
		<p>
			<img class='anexo_dre' id='img_anexo_dre' style="width: 150px;height: 150px;" src="" alt="" />
			<button type="button" onclick="deleteAnexoDre()" class="btn btn-default btn-sm">Excluir Contrato</button>
		</p>
		</div>

		<hr>

		<div class="form-group @if ($errors->has('obs')) has-error @endif">
			<label type="text" class="control-label" for="obs">7 - Notas canceladas, exceções ou observações.*</label>
			<p>*Caso a empresa cancelou alguma nota fiscal cite a sequencia da mesma aqui. Ou caso haja algum caso extraordinário em seu faturamento.</p>
			<input type="text" class="form-control" id="obs" name="obs" value="{{ old("obs", $prestacao->obs) }}">
			@if ($errors->has('obs'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('obs') }}</strong>
			</span>
			@endif
		</div>

		<hr>
		<h3>Evolução dos negócios</h3>
		<p>Nesta seção buscamos entender a sua relação com o mercado. Caso não possua as respostas diga "Não mensurado" ou (0), mas lembre-se se estamos perguntando é por que é um dado que provavelmente a empresa deveria ter.</p>
		<hr>

		<div class="form-group @if ($errors->has('qtd_cliente')) has-error @endif">
			<label type="text" class="control-label" for="qtd_cliente">8 - Qual o número total de clientes no mês? (Responda apenas com números)</label>
			<input type="text" class="form-control" id="qtd_cliente" name="qtd_cliente" value="{{ old("qtd_cliente", $prestacao->qtd_cliente) }}">
			@if ($errors->has('qtd_cliente'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('qtd_cliente') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group @if ($errors->has('qtd_novos_clientes')) has-error @endif">
			<label type="text" class="control-label" for="qtd_novos_clientes">9 - Qual o número de novos clientes no mês? (Responda apenas com números)</label>
			<input type="text" class="form-control" id="qtd_novos_clientes" name="qtd_novos_clientes" value="{{ old("qtd_novos_clientes", $prestacao->qtd_novos_clientes) }}">
			@if ($errors->has('qtd_novos_clientes'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('qtd_novos_clientes') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group @if ($errors->has('qtd_perda_clientes')) has-error @endif">
			<label type="text" class="control-label" for="qtd_perda_clientes">10 - Qual a perda de clientes no mês? (Responda apenas com números)</label>
			<input type="text" class="form-control" id="qtd_perda_clientes" name="qtd_perda_clientes" value="{{ old("qtd_perda_clientes", $prestacao->qtd_perda_clientes) }}">
			@if ($errors->has('qtd_perda_clientes'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('qtd_perda_clientes') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group @if ($errors->has('cac')) has-error @endif">
			<label type="text" class="control-label" for="cac">11 - Qual o seu custo para aquisição de clientes (CAC)? (Responda apenas com números 00,00, não utilize ponto, use apenas virgula[00,00])</label>
			<input type="text" class="form-control" id="cac" name="cac" value="{{ old("cac", $prestacao->cac) }}">
			@if ($errors->has('cac'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('cac') }}</strong>
			</span>
			@endif
		</div>		

		<hr>

		<div class="form-group @if ($errors->has('prev_lancamento')) has-error @endif">
			<label type="text" class="control-label" for="prev_lancamento"> 12 - Caso sua empresa não esteja no mercado, qual a previsão para entrada no mercado (em meses)? (Responda apenas com números em meses) </label>
			<input type="text" class="form-control" id="prev_lancamento" name="prev_lancamento" value="{{ old("prev_lancamento", $prestacao->prev_lancamento) }}">
			@if ($errors->has('prev_lancamento'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('prev_lancamento') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group">
			<p>13 - Qual sua percepção quanto ao nível de eficiência operacional das seguintes áreas de sua empresa? (Essa é uma autoavaliação, insira um valor de 0 a 5 para avaliar.)</p>
			<p>0 - (não operante)</p>
			<p>5 - (totalmente operante e eficiente)</p>
		</div>
		<div class="form-group @if ($errors->has('per_vendas')) has-error @endif">
			<label type="text" class="control-label" for="per_vendas"> 13.1 - Vendas </label>
			<input type="text" min="0" max="5" class="form-control" id="per_vendas" name="per_vendas" value="{{ old("per_vendas", $prestacao->per_vendas) }}">
			@if ($errors->has('per_vendas'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('per_vendas') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('per_tecnicos')) has-error @endif">
			<label type="text" class="control-label" for="per_tecnicos"> 13.2 - Técnico </label>
			<input type="text" min="0" max="5" class="form-control" id="per_tecnicos" name="per_tecnicos" value="{{ old("per_tecnicos", $prestacao->per_tecnicos) }}">
			@if ($errors->has('per_tecnicos'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('per_tecnicos') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('per_juridicos')) has-error @endif">
			<label type="text" class="control-label" for="per_juridicos"> 13.3 - Jurídico </label>
			<input type="text" min="0" max="5" class="form-control" id="per_juridicos" name="per_juridicos" value="{{ old("per_juridicos", $prestacao->per_juridicos) }}">
			@if ($errors->has('per_juridicos'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('per_juridicos') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('per_pessoas')) has-error @endif">
			<label type="text" class="control-label" for="per_pessoas"> 13.4 - Pessoas </label>
			<input type="text" min="0" max="5" class="form-control" id="per_pessoas" name="per_pessoas" value="{{ old("per_pessoas", $prestacao->per_pessoas) }}">
			@if ($errors->has('per_pessoas'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('per_pessoas') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('per_financeiro')) has-error @endif">
			<label type="text" class="control-label" for="per_financeiro"> 13.5 - Financeiro </label>
			<input type="text" min="0" max="5" class="form-control" id="per_financeiro" name="per_financeiro" value="{{ old("per_financeiro", $prestacao->per_financeiro) }}">
			@if ($errors->has('per_financeiro'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('per_financeiro') }}</strong>
			</span>
			@endif
		</div> 
		<div class="form-group @if ($errors->has('per_marketing')) has-error @endif">
			<label type="text" class="control-label" for="per_marketing"> 13.6 - Marketing </label>
			<input type="text" min="0" max="5" class="form-control" id="per_marketing" name="per_marketing" value="{{ old("per_marketing", $prestacao->per_marketing) }}">
			@if ($errors->has('per_marketing'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('per_marketing') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group @if ($errors->has('per_gestao')) has-error @endif">
			<label type="text" class="control-label" for="per_gestao"> 13.7 - Gestão </label>
			<input type="text" min="0" max="5" class="form-control" id="per_gestao" name="per_gestao" value="{{ old("per_gestao", $prestacao->per_gestao) }}">
			@if ($errors->has('per_gestao'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('per_gestao') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group">
			<p>14 - Qual o seu nível de otimismo com o seu negócio? (insira um valor de 0 a 10 para avaliar.)</p>
			<p>0 - (pessimista - não sei se tem futuro)</p>
			<p>10 - (otimista - vou ficar milionário)</p>
		</div>
		<div class="form-group @if ($errors->has('nivel_otimismo')) has-error @endif">
			<label type="text" class="control-label" for="nivel_otimismo"> 14 - Otimismo no negócio? </label>
			<input type="text" min="0" max="10" class="form-control" id="nivel_otimismo" name="nivel_otimismo" value="{{ old("nivel_otimismo", $prestacao->nivel_otimismo) }}">
			@if ($errors->has('nivel_otimismo'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('nivel_otimismo') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group">
			<p>15 - Como você avalia sua interação com o Colearning e os outros incubados? (insira um valor de 0 a 10 para avaliar.)</p>
			<p>0 - (existem outros?)</p>
			<p>10 - (sinergia total)</p>
		</div>
		<div class="form-group @if ($errors->has('nivel_interacao')) has-error @endif">
			<label type="text" class="control-label" for="nivel_interacao"> 15 - Interação Colearning? </label>
			<input type="text" min="0" max="10" class="form-control" id="nivel_interacao" name="nivel_interacao" value="{{ old("nivel_interacao", $prestacao->nivel_interacao) }}">
			@if ($errors->has('nivel_interacao'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('nivel_interacao') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group">
			<p>16 - Qual o seu nível de satisfação com o Colearning? (insira um valor de 0 a 10 para avaliar.)</p>
			<p>0 - (não tenho suporte?)</p>
			<p>10 - (vou morar na SATC)</p>
		</div>
		<div class="form-group @if ($errors->has('nivel_satisfacao')) has-error @endif">
			<label type="text" class="control-label" for="nivel_satisfacao"> 16 - Satisfação Colearning? </label>
			<input type="text" min="0" max="10" class="form-control" id="nivel_satisfacao" name="nivel_satisfacao" value="{{ old("nivel_satisfacao", $prestacao->nivel_satisfacao) }}">
			@if ($errors->has('nivel_satisfacao'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('nivel_satisfacao') }}</strong>
			</span>
			@endif
		</div>

		<hr>

		<div class="form-group">
			<p>17 - Quais são seus próximos passos e o que o seu negócio precisa para o(s) próximo(s) mês(es)?</p>
			<p>Conte ao Colearning quais são seus próximos passos, seu planejamento e também como podemos te ajudar.</p>
		</div>
		<div class="form-group @if ($errors->has('proximos_passos')) has-error @endif">
			<label type="text" class="control-label" for="proximos_passos"> 17 - Próximos Passos?</label>
			<input type="text" class="form-control" id="proximos_passos" name="proximos_passos" value="{{ old("proximos_passos", $prestacao->proximos_passos) }}">
			@if ($errors->has('proximos_passos'))
			<span class="invalid-feedback help-block" role="alert">
				<strong>{{ $errors->first('proximos_passos') }}</strong>
			</span>
			@endif
		</div>

		<br />
		<button type="submit" class="btn btn-success">Alterar Prestação de Contas</button>
	</fieldset>
</form>
@endsection