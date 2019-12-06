<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSocietesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('societes', function(Blueprint $table)
		{
			$table->foreign('file_id')->references('id')->on('files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('societes', function(Blueprint $table)
		{
			$table->dropForeign('societes_file_id_foreign');
		});
	}

}
