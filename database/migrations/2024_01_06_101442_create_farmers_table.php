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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kp')->unique();
            $table->unsignedTinyInteger('umur')->default(0);
            $table->string('milik')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('jantina')->nullable();
            
            $table->string('bangsa')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
