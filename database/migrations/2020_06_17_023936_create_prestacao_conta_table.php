<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacaoContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestacao_conta', function (Blueprint $table) {
            $table->bigIncrements('id');
				$table->timestamps();
				$table->unsignedBigInteger('user_id');
				$table->unsignedBigInteger('empresa_id');
				$table->unsignedBigInteger('status_id');
				$table->unsignedBigInteger('registro_membros_id');
				
				$table->integer('mes_referencia');
				$table->double('faturamento_bruto', 8, 2);
				$table->double('faturamento_liquido', 8, 2);
				$table->double('custo_operacional', 8, 2);
				$table->string('anexo_dre')->nullable();
				$table->longText('obs')->nullable();
				$table->integer('qtd_cliente');
				$table->integer('qtd_novos_clientes');
				$table->integer('qtd_perda_clientes');
				$table->double('cac', 8, 2);
				$table->integer('prev_lancamento');
				
				// Pesquisa de percepção e eficiencia
				$table->integer('per_vendas');
				$table->integer('per_tecnicos');
				$table->integer('per_juridicos');
				$table->integer('per_pessoas');
				$table->integer('per_financeiro');
				$table->integer('per_marketing');
				$table->integer('per_gestao');
				$table->integer('nivel_otimismo');
				$table->integer('nivel_interacao');
				$table->integer('nivel_satisfacao');

				$table->longText('proximos_passos')->nullable();
				$table->integer('part_satc');
				$table->double('faturamento_satc', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestacao_conta');
    }
}
