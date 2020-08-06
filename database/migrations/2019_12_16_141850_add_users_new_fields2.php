<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersNewFields2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            //Employer
            $table->string('session_ad_by_position')->default('');
            $table->string('session_ad_by_email')->default('');
            $table->string('session_ad_by_contact')->default('');
            $table->string('organisation_position')->default('');
            $table->string('organisation_email')->default('');
            $table->string('organisation_contact')->default('');
            $table->string('prof_qual_cert')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
