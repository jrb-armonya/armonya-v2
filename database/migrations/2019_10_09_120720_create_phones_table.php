<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nbr', 191);
			$table->integer('order')->nullable();
			$table->boolean('used');
			$table->text('comment', 65535)->nullable();
			$table->timestamps();
			$table->integer('file_id')->unsigned()->nullable()->index('phones_file_id_foreign');
			$table->integer('societe_id')->unsigned()->nullable()->index('phones_societe_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phones');
	}

}
