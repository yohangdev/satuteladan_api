<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$prefix = Config::get('database.connections.pgsql.prefix');

		    $table->bigInteger('id')->primary()->unsigned()->default(DB::raw("{$prefix}id_generator()"));
		    $table->string('email');
		    $table->string('password');
		    $table->boolean('active');
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
		Schema::drop('users');
	}

}
