<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartenairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name', 100);
            $table->string('desc', 255)->nullable();
            $table->string('email')->unique();

            $table->string('adre', 255)->nullable();
            $table->string('ville', 255)->nullable();
            $table->integer('cp')->nullable();

            $table->boolean('isActive')->default(1);
            
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
        Schema::dropIfExists('partenaires');
    }
}
