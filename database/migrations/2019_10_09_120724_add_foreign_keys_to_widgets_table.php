<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWidgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('widgets', function(Blueprint $table)
		{
			$table->foreign('role_id')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('status_id')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('widgets', function(Blueprint $table)
		{
			$table->dropForeign('widgets_role_id_foreign');
			$table->dropForeign('widgets_status_id_foreign');
		});
	}

}
