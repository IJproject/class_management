<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Lesson;
use App\Models\Time;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
    ];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function time(): BelongsTo
    {
        return $this->belongsTo(Time::class);
    }
}
