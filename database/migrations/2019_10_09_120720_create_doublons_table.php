<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoublonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doublons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('fiche1')->unsigned()->index('doublons_fiche1_foreign');
			$table->integer('fiche2')->unsigned()->index('doublons_fiche2_foreign');
			$table->string('subject');
			$table->timestamps();
			$table->integer('is_not')->default(0);
			$table->integer('is_doublons')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doublons');
	}

}
