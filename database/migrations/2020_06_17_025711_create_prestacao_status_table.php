<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacaoStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestacao_status', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('desc_status');
				$table->timestamps();
				
		  });
	  	// Inserir dados ao gerar a tabela
		DB::table('prestacao_status')->insert([
				['desc_status' => 'Aprovada'],
				['desc_status' => 'Reprovada'],
				['desc_status' => 'Em análise'],
				['desc_status' => 'Incompleta']
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestacao_status');
    }
}
