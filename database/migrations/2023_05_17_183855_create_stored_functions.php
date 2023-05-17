<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE FUNCTION utolsoMeresDatum(termelo INT, mero INT) RETURNS DATETIME DETERMINISTIC BEGIN DECLARE uccso DATETIME; SET uccso = CAST('2023-01-01' AS DATETIME); SELECT veg INTO uccso FROM meres_adats WHERE termeloberendezesid = termelo AND meroberendezesid = mero ORDER BY veg DESC LIMIT 1; RETURN uccso; END");
        DB::unprepared("CREATE FUNCTION utolsoMeresErtek(termelo INT, mero INT) RETURNS REAL DETERMINISTIC BEGIN DECLARE uccso REAL; SET uccso = 0; SELECT SUM(ertek) INTO uccso FROM meres_adats WHERE termeloberendezesid = termelo AND meroberendezesid = mero; RETURN uccso; END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION utolsoMeresDatum");
        DB::unprepared("DROP FUNCTION utolsoMeresErtek");
    }
};
