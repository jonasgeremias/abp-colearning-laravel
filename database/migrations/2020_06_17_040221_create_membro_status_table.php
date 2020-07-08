<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembroStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('membro_status', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('desc_status');
			$table->timestamps();
	  });
	  
		// Inserir dados ao gerar a tabela
		DB::table('membro_status')->insert([
				['desc_status' => 'Ativo'],
				['desc_status' => 'Inativo']
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membro_status');
    }
}
