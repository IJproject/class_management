<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Schedule;
use App\Models\Timegroup;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'finish',
    ];

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function timegroups(): HasMany
    {
        return $this->hasMany(Timegroup::class);
    }
}
