<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('fiche_id')->unsigned()->index('actions_fiche_id_foreign');
			$table->integer('user_id')->unsigned()->index('actions_user_id_foreign');
			$table->string('action');
			$table->integer('partenaire_id')->unsigned()->nullable()->index('actions_partenaire_id_foreign');
			$table->integer('new_status')->unsigned()->nullable()->index('actions_new_status_foreign');
			$table->integer('old_status')->unsigned()->nullable()->index('actions_old_status_foreign');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actions');
	}

}
