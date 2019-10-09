<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actions', function(Blueprint $table)
		{
			$table->foreign('fiche_id')->references('id')->on('fiches')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('new_status')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('old_status')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('partenaire_id')->references('id')->on('partenaires')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('actions', function(Blueprint $table)
		{
			$table->dropForeign('actions_fiche_id_foreign');
			$table->dropForeign('actions_new_status_foreign');
			$table->dropForeign('actions_old_status_foreign');
			$table->dropForeign('actions_partenaire_id_foreign');
			$table->dropForeign('actions_user_id_foreign');
		});
	}

}
