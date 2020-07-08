<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
				$table->string('desc_permission');
				$table->timestamps();
		  });
		  
			// Inserir dados ao gerar a tabela
			DB::table('user_permissions')->insert([
				['desc_permission' => 'Admin'],
				['desc_permission' => 'Read'],
				['desc_permission' => 'Read and Write']
			]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissions');
    }
}
