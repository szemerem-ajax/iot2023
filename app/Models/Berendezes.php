<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Berendezes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'szulo'
    ];

    public function eloMeresek(): HasMany
    {
        return $this->hasMany(EloMeresAdat::class, 'termeloberendezesid');
    }

    public function meresek(): HasMany
    {
        return $this->hasMany(MeresAdat::class, 'termeloberendezesid')->orderByRaw('kezdes');
    }

    public function gyerekek(): HasMany
    {
        return $this->hasMany(Berendezes::class, 'szulo');
    }

    public function osszes()
    {
        $ret = MeresAdat::query()
            ->where('termeloberendezesid', '=', $this->id)
            // ->groupBy(['ertek', 'egyseg', 'kezdes', 'veg'])
            // ->selectRaw('ertek, egyseg, kezdes, veg')
            ->get()
            ->groupBy('egyseg');

        return $ret;
    }

    public function legutobbi()
    {
        return $this->meresek()
            ->orderByRaw('veg desc')
            ->groupBy(['egyseg', 'ertek', 'veg', 'kezdes'])
            ->selectRaw('ertek, egyseg, veg')
            ->get()
            ->groupBy('egyseg');
    }
}
