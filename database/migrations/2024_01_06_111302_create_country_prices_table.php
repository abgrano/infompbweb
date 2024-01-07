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
        Schema::create('country_prices', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
            $table->date('date_data');
            $table->string('name');
            $table->unsignedDouble('black')->default(0);
            $table->unsignedDouble('white')->default(0);
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_prices');
    }
};
