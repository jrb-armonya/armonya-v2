<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoublonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doublons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fiche1');
            $table->unsignedInteger('fiche2');
            $table->string('subject', '255');
            $table->foreign('fiche1')->references('id')->on('fiches');
            $table->foreign('fiche2')->references('id')->on('fiches');
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
        Schema::dropIfExists('doublons');
    }
}
