<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{	
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
				$table->string('name');
				$table->string('email')->unique();
				$table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
				$table->unsignedBigInteger('permission_id')->index();
				$table->string('password');
            $table->rememberToken();
            $table->timestamps();
		  });

		  	DB::table('users')->insert([
				'name' => 'Admin',
				'email' => 'admin@admin',
				'password' => Hash::make('admin'),
				'permission_id' => 1
			]);
		

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
