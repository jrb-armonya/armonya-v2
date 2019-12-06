<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocietesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('societes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('adresse', 191);
			$table->integer('nbr_phones');
			$table->text('comment', 65535);
			$table->boolean('inFile')->default(0);
			$table->timestamps();
			$table->string('standard', 191);
			$table->integer('file_id')->unsigned()->nullable()->index('societes_file_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('societes');
	}

}
