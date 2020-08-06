<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManyFieldsUsers extends Migration
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
            $table->string('org_desc')->default('');
            $table->string('setting')->default('');
            $table->string('pin')->default('');
            $table->date('pin_date_revalid');
            $table->string('emp_pos')->default('');
            $table->string('emp_email')->default('');
            $table->string('backup_emp_contact')->default('');
            $table->string('backup_emp_email')->default('');
            $table->string('backup_emp_pos')->default('');
            $table->string('backup_emp_tel')->default('');
            $table->string('insurance')->default('');
            $table->string('org_name')->default('');
            $table->string('policy_number')->default('');
            $table->text('prof_ind_cert');
            $table->string('prof_required')->default('');
            $table->string('special_interests')->default('');
            $table->text('certs');
            $table->string('appo_slot_times')->default('');
            $table->string('adm_catch_time')->default('');
            $table->string('time_allowed')->default('');
            $table->string('breaks')->default('');
            $table->string('payment_terms')->default('');
            $table->string('direct_booking')->default('');
            $table->string('session_ad_by')->default('');

            //Contractor, freelancer
            $table->string('nationality')->default('');
            $table->string('profession')->default('');
            $table->string('right_of_work')->default('');
            $table->text('passport_visa');
            $table->text('prof_qualifications');//json
            $table->text('mand_training');
            $table->text('cert_of_crbdbs');
            $table->text('occup_health');
            $table->string('c_prof_ind_insurance')->default('');
            $table->string('c_payment_methods')->default('');
            $table->string('c_ltd_comp_name')->default('');
            $table->string('c_ltd_comp_number')->default('');


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
