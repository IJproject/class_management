<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\News;

class Target extends Model
{
    use HasFactory;

    public function newss(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
