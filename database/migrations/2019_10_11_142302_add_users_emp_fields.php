<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersEmpFields extends Migration
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
                $table->string('emp_contact')->default('');
                $table->string('emp_telno')->default('');
                $table->string('emp_website')->default('');
                $table->string('emp_cqc_rating')->default('');
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
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->dropColumn('emp_contact');
                $table->dropColumn('emp_telno');
                $table->dropColumn('emp_website');
                $table->dropColumn('emp_cqc_rating');
            }
        );
    }
}
