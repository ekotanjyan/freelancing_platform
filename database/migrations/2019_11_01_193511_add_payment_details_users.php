<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentDetailsUsers extends Migration
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
                $table->string('payment_option')->default('');
                $table->string('p60')->default('');
                $table->string('paypal')->default('');
                $table->string('bacs')->default('');
                $table->string('cheque')->default('');
                $table->string('limitied_company_number')->default('');
                $table->string('stripe_token')->default('');
                $table->string('plan_id')->default('');

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
                $table->dropColumn('payment_option');
                $table->dropColumn('p60');
                $table->dropColumn('paypal');
                $table->dropColumn('bacs');
                $table->dropColumn('limitied_company_number');
                $table->dropColumn('stripe_token');
                $table->dropColumn('plan_id');
            }
        );
    }
}
