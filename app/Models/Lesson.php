<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Type;
use App\Models\Schedule;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'memo',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function Schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
