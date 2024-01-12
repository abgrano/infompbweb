<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'name', 'slug'];

    Public function dataexport(): HasMany
    {
        return $this->hasMany(DataExport::class);
    }

    Public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    Public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
