<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichesOpenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches_open', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('fiche_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fiche_id')->references('id')->on('fiches');

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
        Schema::dropIfExists('fiches_open');
    }
}
