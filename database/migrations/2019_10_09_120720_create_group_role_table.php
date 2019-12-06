<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_role', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 45);
			$table->string('desc', 45)->nullable();
			$table->timestamps();
			$table->string('deleted_at', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_role');
	}

}
