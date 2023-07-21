<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Schedule;
use App\Models\Time;

class OwnerTopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('time')->get();
        $lessons = Lesson::with(['teacher', 'student', 'subject', 'type', 'schedule', 'schedule.time'])->get();
        return Inertia::render('Owner/Top/Index', [
            'lessons' => $lessons,
            'schedules' => $schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
