<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFichesOpenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fiches_open', function(Blueprint $table)
		{
			$table->foreign('fiche_id')->references('id')->on('fiches')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fiches_open', function(Blueprint $table)
		{
			$table->dropForeign('fiches_open_fiche_id_foreign');
			$table->dropForeign('fiches_open_user_id_foreign');
		});
	}

}
