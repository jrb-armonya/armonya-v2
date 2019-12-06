<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWidgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('widgets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('status_id')->unsigned()->nullable()->index('widgets_status_id_foreign');
			$table->integer('role_id')->unsigned()->nullable()->index('widgets_role_id_foreign');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('order')->nullable();
			$table->string('desc')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('widgets');
	}

}
