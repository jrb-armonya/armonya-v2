<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartenaireEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partenaire_emails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email');
			$table->integer('partenaire_id')->unsigned()->nullable()->index('partenaire_emails_partenaire_id_foreign');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partenaire_emails');
	}

}
