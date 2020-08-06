<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileNewFields extends Migration
{
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('org_type')->default('');
            $table->string('hourly_rate_negotiable')->default('');
            $table->string('hourly_rate_desc')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('org_type');
            $table->dropColumn('hourly_rate_negotiable');
            $table->dropColumn('hourly_rate_desc');
        });
    }
}
