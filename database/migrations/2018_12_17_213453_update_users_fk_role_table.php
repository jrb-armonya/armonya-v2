<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersFkRoleTable extends Migration
{
    public function up()
    {   
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }
    
    public function down()
    {
        $table->dropForeign('users_role_id_foreign');
    }
}
