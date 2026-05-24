<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('payment_type')->nullable()->after('transaction_id');
            $table->string('transaction_status')->nullable()->after('payment_type');
            $table->string('transaction_time')->nullable()->after('transaction_status');
            $table->string('settlement_time')->nullable()->after('transaction_time');
            $table->string('fraud_status')->nullable()->after('settlement_time');
            $table->string('issuer')->nullable()->after('fraud_status');
            $table->string('acquirer')->nullable()->after('issuer');
            $table->string('currency')->nullable()->after('acquirer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
