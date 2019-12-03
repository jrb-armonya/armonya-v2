<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPartenaireUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partenaire_user', function(Blueprint $table)
		{
			$table->foreign('user_id', 'partenaire_user_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('partenaire_id', 'partenaire_user_ibfk_2')->references('id')->on('partenaires')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('partenaire_user', function(Blueprint $table)
		{
			$table->dropForeign('partenaire_user_ibfk_1');
			$table->dropForeign('partenaire_user_ibfk_2');
		});
	}

}
