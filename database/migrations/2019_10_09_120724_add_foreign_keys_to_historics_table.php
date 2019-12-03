<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHistoricsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('historics', function(Blueprint $table)
		{
			$table->foreign('conf_id', 'historics_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('action_id', 'historics_ibfk_10')->references('id')->on('actions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('fiche_id', 'historics_ibfk_11')->references('id')->on('fiches')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ecoute_id', 'historics_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('env_id', 'historics_ibfk_3')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('facture_id', 'historics_ibfk_4')->references('id')->on('factures')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('partenaire_id', 'historics_ibfk_5')->references('id')->on('partenaires')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('repo_id', 'historics_ibfk_6')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('rtv_id', 'historics_ibfk_7')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('status_id', 'historics_ibfk_8')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'historics_ibfk_9')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('historics', function(Blueprint $table)
		{
			$table->dropForeign('historics_ibfk_1');
			$table->dropForeign('historics_ibfk_10');
			$table->dropForeign('historics_ibfk_11');
			$table->dropForeign('historics_ibfk_2');
			$table->dropForeign('historics_ibfk_3');
			$table->dropForeign('historics_ibfk_4');
			$table->dropForeign('historics_ibfk_5');
			$table->dropForeign('historics_ibfk_6');
			$table->dropForeign('historics_ibfk_7');
			$table->dropForeign('historics_ibfk_8');
			$table->dropForeign('historics_ibfk_9');
		});
	}

}
