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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->string('sku')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('brand')->nullable();
            $table->boolean('status')->default(true); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
