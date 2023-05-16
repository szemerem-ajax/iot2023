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
        return $this->hasMany(Berendezes::class);
    }
}
