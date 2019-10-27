<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cr');
            $table->unsignedBigInteger('fiche_id');
            $table->unsignedBigInteger('partenaire_id');
            $table->foreign('fiche_id')->references('id')->on('fiches');
            $table->foreign('partenaire_id')->references('id')->on('partenaires');
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
        Schema::dropIfExists('crs');
    }
}
