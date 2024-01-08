<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name'];

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
