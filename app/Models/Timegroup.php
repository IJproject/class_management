<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Time;

class Timegroup extends Model
{
    use HasFactory;

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
