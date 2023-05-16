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
        Schema::create('meres_adats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('termeloberendezesid')->constrained('berendezes');
            $table->foreignId('meroberendezesid')->constrained('berendezes');
            $table->dateTime('kezdes');
            $table->dateTime('veg');
            $table->string('egyseg');
            $table->float('ertek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meres_adats');
    }
};
