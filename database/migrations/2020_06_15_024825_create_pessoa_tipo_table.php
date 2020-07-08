<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_tipo', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('desc_tipo');
            $table->timestamps();
		  });
			  
		  // Inserir dados ao gerar a tabela
			DB::table('pessoa_tipo')->insert([
				['desc_tipo' => 'Masculino'],
				['desc_tipo' => 'Feminino'],
				['desc_tipo' => 'Outros']
			]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_tipo');
    }
}
