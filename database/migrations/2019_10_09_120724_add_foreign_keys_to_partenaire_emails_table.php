<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPartenaireEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partenaire_emails', function(Blueprint $table)
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
		Schema::table('partenaire_emails', function(Blueprint $table)
		{
			$table->dropForeign('partenaire_emails_partenaire_id_foreign');
		});
	}

}
