<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyLocalPrice extends Model
{
    use HasFactory;

    protected $fillable = ['date_data', 'city_id', 'black', 'white', 'description', 'is_active'];

    Public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
