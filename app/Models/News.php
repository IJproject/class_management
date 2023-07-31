<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Target;

class News extends Model
{
    use HasFactory;

    public function target(): BelongsTo
    {
        return $this->belongsTo(Target::class);
    }
}
