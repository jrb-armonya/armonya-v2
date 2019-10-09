<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFacturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('factures', function(Blueprint $table)
		{
			$table->foreign('partenaire_id')->references('id')->on('partenaires')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('factures', function(Blueprint $table)
		{
			$table->dropForeign('factures_partenaire_id_foreign');
		});
	}

}
