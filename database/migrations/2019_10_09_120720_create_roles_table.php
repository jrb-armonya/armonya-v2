<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 25);
			$table->softDeletes();
			$table->timestamps();
			$table->string('class')->nullable()->unique();
			$table->string('color', 6)->nullable();
			$table->string('desc')->nullable();
			$table->integer('status_id')->unsigned()->nullable()->index('roles_status_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles');
	}

}
