<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date_payement')->nullable();
			$table->string('status');
			$table->integer('partenaire_id')->unsigned()->index('factures_partenaire_id_foreign');
			$table->timestamps();
			$table->float('amount')->default(0.00);
			$table->integer('pdf_id')->nullable();
			$table->string('uiid')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factures');
	}

}
