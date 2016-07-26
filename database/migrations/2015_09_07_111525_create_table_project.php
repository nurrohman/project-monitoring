<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('client_id');
            $table->text('description');
            $table->string('scope');
            $table->string('bahasa_prog');
            $table->string('database');
            $table->string('server');
            $table->string('other');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function($table){
            $table->dropColumn('client_id');
            $table->dropColumn('description');
            $table->dropColumn('scope');
            $table->dropColumn('bahasa_prog');
            $table->dropColumn('database');
            $table->dropColumn('server');
            $table->dropColumn('other');
        });
    }
}
