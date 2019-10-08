<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fiche_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('partenaire_id');

            $table->unsignedInteger('new_status');
            $table->unsignedInteger('old_status');

            $table->string('action', 255);

            $table->foreign('fiche_id')->references('id')->on('fiches');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('partenaire_id')->references('id')->on('partenaires');
            $table->foreign('new_status')->references('id')->on('status');
            $table->foreign('old_status')->references('id')->on('status');

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
        Schema::dropIfExists('actions');
    }
}
