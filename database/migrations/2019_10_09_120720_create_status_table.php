<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 25)->unique();
			$table->string('desc')->nullable();
			$table->integer('type')->default(0);
			$table->integer('isActive')->default(1);
			$table->timestamps();
			$table->softDeletes();
			$table->string('class')->unique();
			$table->string('color', 6);
			$table->string('icon')->nullable()->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('status');
	}

}
