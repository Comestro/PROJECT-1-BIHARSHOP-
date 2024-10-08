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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("referal_id")->nullable();;
            $table->bigInteger("membership_id")->nullable();;
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->nullable();
            $table->string('token')->nullable();;
            $table->string('name')->nullable();;
            $table->date('date_of_birth')->nullable();;
            $table->string('nationality')->nullable();;
            $table->string('marital_status')->nullable();;
            $table->string('religion')->nullable();;
            $table->string('father_name')->nullable();;
            $table->string('mother_name')->nullable();;
            $table->text('home_address')->nullable();;
            $table->string('city')->nullable();;
            $table->string('pincode')->nullable();;
            $table->string('state')->nullable();;
            $table->string('mobile')->nullable();;
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();;
            $table->string('nominee_name')->nullable();;
            $table->string('nominee_relation')->nullable();;
            $table->string('bank_name')->nullable();;
            $table->string('branch_name')->nullable();;
            $table->string('account_no')->nullable();;
            $table->string('ifsc')->nullable();;
            $table->string('pancard')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->string('image')->nullable();
            $table->boolean('isPaid')->default(false);
            $table->string('payment_method')->nullable();
            $table->boolean('isVerified')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
