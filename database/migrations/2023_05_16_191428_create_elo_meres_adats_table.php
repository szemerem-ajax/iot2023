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
        Schema::create('elo_meres_adats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('termeloberendezesid')->constrained('berendezes');
            $table->string('egyseg');
            $table->float('ertek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elo_meres_adats');
    }
};
