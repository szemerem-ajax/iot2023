<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloMeresAdat extends Model
{
    use HasFactory;

    protected $fillable = [
        'egyseg',
        'ertek'
    ];

    public function termeloBerendezes(): BelongsTo {
        return $this->belongsTo(Berendezes::class, 'termeloberendezesid');
    }

    public function meroBerendezes(): BelongsTo {
        return $this->belongsTo(Berendezes::class, 'meroberendezesid');
    }
}
