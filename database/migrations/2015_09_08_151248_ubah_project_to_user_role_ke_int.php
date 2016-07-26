<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UbahProjectToUserRoleKeInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_to_user', function (Blueprint $table) {
            $table->integer('user_role')->unsigned()->change();

            //$table->foreign('user_role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_to_user', function (Blueprint $table) {
            //$table->dropForeign('project_to_user_user_role_foreign');

            $table->string('user_role')->change();

        });
    }
}
