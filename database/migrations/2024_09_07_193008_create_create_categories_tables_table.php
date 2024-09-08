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
        Schema::create('create_categories_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId("parent_category_id")->constrained()->onDelete("cascade");
            $table->string('cat_slug')->unique();
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_categories_tables');
    }
};
