<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->timestamps();
				$table->string('nome');
				$table->string('cpf', 32)->unique();
				$table->string('rg', 32)->unique();
				$table->string('email')->unique();
				$table->string('user_wifi', 255)->nullable();
				$table->string('pass_wifi', 255)->nullable();
				$table->longText('obs')->nullable();
				$table->unsignedBigInteger('tipo_id');
				$table->unsignedBigInteger('status_id');
				// pode ser adicionado o endereço da pessoa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
