<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->timestamps();
				$table->string('nome_fantasia');
				$table->string('razao_social');
				$table->string('cnpj', 32)->unique();
				
				$table->string('part_satc', 32); // Pendnete este
				
				$table->string('nome_ceo');
				$table->string('email')->unique();
				
				$table->date('data_inicio_contrato');
				$table->date('data_vigencia_1'); // 2 Anos
				$table->date('data_vigencia_2'); // 7 anos
				
				$table->string('anexo_cont_social')->nullable();
				$table->string('anexo_cont_incub')->nullable();
				$table->string('anexo_adit_incub')->nullable();
				
				$table->longText('obs')->nullable();
				$table->unsignedBigInteger('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
