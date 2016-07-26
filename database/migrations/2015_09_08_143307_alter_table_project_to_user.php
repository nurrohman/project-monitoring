<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProjectToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_prefix = DB::getTablePrefix();

        // DB::statement("ALTER TABLE `" . $table_prefix . "project_to_user` MODIFY COLUMN user_role int(6)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table_prefix = DB::getTablePrefix();

        // DB::statement("ALTER TABLE `" . $table_prefix . "project_to_user` MODIFY COLUMN user_role varchar(255)");
    }
}
