<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('phones', function(Blueprint $table)
		{
			$table->foreign('file_id')->references('id')->on('files')->onUpdate('RESTRICT')->onDelete('SET NULL');
			$table->foreign('societe_id')->references('id')->on('societes')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('phones', function(Blueprint $table)
		{
			$table->dropForeign('phones_file_id_foreign');
			$table->dropForeign('phones_societe_id_foreign');
		});
	}

}
