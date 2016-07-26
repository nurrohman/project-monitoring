<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableBacklog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('backlogs', function (Blueprint $table) {
                $table->date('start_date');
                $table->date('due_date');
                $table->integer('mandays');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backlogs', function($table){
            $table->dropColumn('start_date');
            $table->dropColumn('due_date');
            $table->dropColumn('mandays');
        });
    }
}
