<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Uzem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function machines(): HasMany
    {
        return $this->hasMany(Berendezes::class, 'uzem_id', 'id');
    }

    public function aktualis()
    {
        return EloMeresAdat::with('termeloBerendezes')
            ->whereHas('termeloBerendezes', function ($builder) {
                $builder->where('uzem_id', '=', $this->id);
            })
            ->groupBy(['ertek', 'egyseg'])
            ->selectRaw('sum(ertek) as ertek, egyseg')
            ->get();
    }

    public function osszes()
    {
        return MeresAdat::with('termeloBerendezes')
            ->whereHas('termeloBerendezes', function ($builder) {
                $builder->where('uzem_id', '=', $this->id);
            })
            ->groupBy(['ertek', 'egyseg', 'kezdes', 'veg'])
            ->selectRaw('sum(ertek) as ertek, egyseg, kezdes, veg')
            ->get()
            ->groupBy('egyseg');
    }
}
