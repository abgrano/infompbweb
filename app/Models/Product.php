<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "code", "name", "slug", "image", "url", "description", "is_visible", "last_edited_by_id"
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
