<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MilestoneAddStartEndDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_milestones', function(Blueprint $table)
        {
            $table->date('start_date')->nullable()->after('name')->index();
            $table->date('end_date')->nullable()->after('start_date')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_milestones', function(Blueprint $table)
        {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
