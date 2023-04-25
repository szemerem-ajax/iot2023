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
        Schema::create('berendezes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->biginteger('szulo')->unsigned();
            $table->biginteger('uzem_id')->unsigned();
        });

        Schema::table('berendezes', function (Blueprint $table) {
            $table->foreign('szulo')->references('id')->on('berendezes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('uzem_id')->references('id')->on('uzems')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berendezes');
    }
};
