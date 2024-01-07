<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    Public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    Public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}