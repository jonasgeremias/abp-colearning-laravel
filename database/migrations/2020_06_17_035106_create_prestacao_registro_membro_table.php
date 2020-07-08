<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacaoRegistroMembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestacao_registro_membro', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->unsignedBigInteger('pretacao_contas_id');
				$table->unsignedBigInteger('membro_id');
				$table->unsignedBigInteger('nome_membro');
				$table->unsignedBigInteger('desc_membro_status');
				$table->unsignedBigInteger('desc_membro_funcao'); // buscar da tabela MembroFuncao
				$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestacao_registro_membro');
    }
}
