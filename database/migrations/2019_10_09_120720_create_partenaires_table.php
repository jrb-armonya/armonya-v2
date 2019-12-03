<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartenairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partenaires', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('desc')->nullable();
			$table->string('adre')->nullable();
			$table->string('ville')->nullable();
			$table->integer('cp')->nullable();
			$table->boolean('isActive')->default(1);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('prix_fiche')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partenaires');
	}

}
