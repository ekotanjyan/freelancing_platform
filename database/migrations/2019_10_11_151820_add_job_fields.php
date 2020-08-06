<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'jobs',
            function (Blueprint $table) {
                $table->string('project_rates')->default('');
                $table->string('start_date')->default('');
                $table->string('max_distance')->default('');
                $table->boolean('is_active')->default(true);
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
            'jobs',
            function (Blueprint $table) {
                $table->dropColumn('project_rates');
                $table->dropColumn('start_date');
                $table->dropColumn('max_distance');
                $table->dropColumn('is_active');
            }
        );
    }
}
