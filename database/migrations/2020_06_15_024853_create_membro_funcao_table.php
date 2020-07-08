<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembroFuncaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro_funcao', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('desc_funcao');
            $table->timestamps();
		  });
		  
		// Inserir dados ao gerar a tabela
		DB::table('membro_funcao')->insert([
			['desc_funcao' => 'Administrador'],
			['desc_funcao' => 'Bolsista'],
			['desc_funcao' => 'Sócio'],
			['desc_funcao' => 'Colaborador']
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membro_funcao');
    }
}
