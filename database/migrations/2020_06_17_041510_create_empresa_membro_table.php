<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaMembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_membros', function (Blueprint $table) {
            $table->bigIncrements('id');
				$table->timestamps();
				$table->unsignedBigInteger('pessoa_id')->index();
				$table->unsignedBigInteger('empresa_id')->index(); // identifica
				$table->unsignedBigInteger('funcao_membro_id');
				$table->unsignedBigInteger('user_id')->nullable();
				$table->date('data_inicio'); // Data de inicio na empresa
				$table->date('data_vigencia')->nullable(); // se for admnistrador, socio...
				$table->string('anexo_documentos')->nullable();
				$table->string('anexo_contratos')->nullable();
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
        Schema::dropIfExists('empresa_membros');
    }
}
