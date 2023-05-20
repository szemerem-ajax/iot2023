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
        DB::unprepared("CREATE TRIGGER eloMeroRogzites AFTER UPDATE ON elo_meres_adats FOR EACH ROW BEGIN INSERT INTO meres_adats(termeloberendezesid, kezdes, veg, egyseg, ertek) VALUES ( NEW.termeloberendezesid, COALESCE(utolsoMeresDatum(NEW.termeloberendezesid, NEW.egyseg), CURRENT_TIMESTAMP()), CURRENT_TIMESTAMP(), NEW.egyseg, NEW.ertek - COALESCE(utolsoMeresErtek(NEW.termeloberendezesid, NEW.egyseg), 0)); END;");
        DB::unprepared("CREATE TRIGGER eloMeroRogzites2 AFTER INSERT ON elo_meres_adats FOR EACH ROW BEGIN INSERT INTO meres_adats(termeloberendezesid, kezdes, veg, egyseg, ertek) VALUES ( NEW.termeloberendezesid, CAST('2023-01-01' AS DATETIME), CURRENT_TIMESTAMP(), NEW.egyseg, NEW.ertek); END;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER iot2023.eloMeroRogzites");
        DB::unprepared("DROP TRIGGER iot2023.eloMeroRogzites2");
    }
};
