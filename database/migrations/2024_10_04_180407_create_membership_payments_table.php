<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('membership_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membership_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 8, 2);
            $table->string('currency', 10);
            $table->string('receipt_no')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('transaction_fee')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('payment_card_id')->nullable();
            $table->string('method')->nullable();
            $table->string('wallet')->nullable();
            $table->string('bank')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_vpa')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('international_payment')->nullable();
            $table->string('error_reason')->nullable();
            $table->string('error_code')->nullable(); 
            $table->string('error_description')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('status')->default('pending');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_payments');
    }
};
