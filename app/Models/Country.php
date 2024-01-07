<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    use HasFactory;

    Public function state(): BelongsToMany
    {
        return $this->belongsToMany(State::class);
    }

    Public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
