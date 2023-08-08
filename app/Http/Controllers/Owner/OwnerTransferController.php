<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\Schedule;
use App\Models\Time;

class OwnerTransferController extends Controller
{
    public function index()
    {
        $times = Time::get();
        $lessons = Lesson::with('schedule', 'schedule.time', 'teacher', 'student')->get();
        $schedules = Schedule::with('time')->get();
        return Inertia::render('Owner/Transfer/Index', [
            'lessons' => $lessons,
            'schedules' => $schedules,
            'times' => $times,
        ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $lesson = Lesson::with('schedule', 'teacher')->findOrFail($id);
        $times = Time::get();
        $teachers = Teacher::get();
        return Inertia::render('Owner/Transfer/Edit', [
            "lesson" => $lesson,
            "times" => $times,
            "teachers" => $teachers
        ]);
    }

    public function update(Request $request, string $id)
    {
        $lesson = Lesson::with('schedule', 'schedule.time', "teacher")->findOrFail($id);

        $lesson->schedule->date = $request->input('transferDate');
        $lesson->schedule->time_id = $request->input('transferTime.id');
        $lesson->teacher_id = $request->input('transferTeacher.id');
        $lesson->update();

        $times = Time::get();
        $lessons = Lesson::with('schedule', 'schedule.time', 'teacher', 'student')->get();
        $schedules = Schedule::with('time')->get();

        return Inertia::render('Owner/Transfer/Index', [
            'lessons' => $lessons,
            'schedules' => $schedules,
            'times' => $times,
        ]);
    }

    public function destroy(string $id)
    {
        
    }
}
