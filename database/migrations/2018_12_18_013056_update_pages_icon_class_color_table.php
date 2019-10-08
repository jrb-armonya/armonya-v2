<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePagesIconClassColorTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('icon', '25')->nullable();
            $table->string('class', '25')->nullable();
            $table->string('color', '8')->nullable();
        });
    }

    public function down()
    {
        //
    }
}
