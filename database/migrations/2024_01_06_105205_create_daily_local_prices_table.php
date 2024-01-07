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
        Schema::create('daily_local_prices', function (Blueprint $table) {
            $table->id();
            $table->date('date_data');
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->unsignedInteger('black')->default(0);
            $table->unsignedInteger('white')->default(0);
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_local_prices');
    }
};
