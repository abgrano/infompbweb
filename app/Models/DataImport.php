<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataImport extends Model
{
    use HasFactory;

    Public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    Public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
