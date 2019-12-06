<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDoublonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('doublons', function(Blueprint $table)
		{
			$table->foreign('fiche1')->references('id')->on('fiches')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('fiche2')->references('id')->on('fiches')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('doublons', function(Blueprint $table)
		{
			$table->dropForeign('doublons_fiche1_foreign');
			$table->dropForeign('doublons_fiche2_foreign');
		});
	}

}
