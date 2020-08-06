<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->string('title')->default('');
                $table->string('telno')->default('');
                $table->string('dob')->default('');
		$table->string('date_available')->default('');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->dropColumn('title');
                $table->dropColumn('telno');
                $table->dropColumn('string');
                $table->dropColumn('date_available');
            }
        );*/
    }
}
