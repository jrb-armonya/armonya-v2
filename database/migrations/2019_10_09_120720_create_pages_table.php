<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 25)->unique();
			$table->string('url')->nullable();
			$table->timestamps();
			$table->string('icon', 25)->nullable();
			$table->string('class', 25)->nullable();
			$table->string('color', 8)->nullable();
			$table->softDeletes();
			$table->integer('parent')->unsigned()->nullable();
			$table->integer('isActive')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
