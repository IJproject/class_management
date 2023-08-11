<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Timegroup;
use App\Models\Schedule;

class OwnerScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Owner/Schedule/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $times = Time::get();
        $timegroups = Timegroup::with('time')->get();
        return Inertia::render('Owner/Schedule/Create', [
            'times' => $times,
            'timegroups' => $timegroups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('type') === 2) {
            $time = new Time;
            $time->start = $request->input('start');
            $time->finish = $request->input('finish');
            $time->save();
        }
        if($request->input('type') === 3) {
            $base = Timegroup::latest('id')->first()->group;
            foreach ($request->input('times') as $time) {
                $newtime = new Timegroup;
                $newtime->time_id = $time;
                $newtime->group = $base+1;
                $newtime->save();
            }
        }
        return Inertia::render('Owner/Schedule/Index');
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
        return Inertia::render('Owner/Schedule/Index');
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
