<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_id')->unsigned()->index('fk_group_user_1_idx');
			$table->integer('user_id')->unsigned()->index('fk_group_user_2_idx');
			$table->integer('role_id')->unsigned()->index('fk_group_user_3_idx');
			$table->primary(['id','group_id','user_id','role_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_user');
	}

}
