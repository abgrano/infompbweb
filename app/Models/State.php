<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class State extends Model
{
    use HasFactory;

    Public function city(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }

    Public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
