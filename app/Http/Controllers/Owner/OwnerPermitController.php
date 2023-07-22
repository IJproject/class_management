<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class OwnerPermitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Owner/Permit/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('role') == "teacher") {

            $teacher = new Teacher;
            $teacher->email = $request->input('email');
            $teacher->lastName = $request->input('lastName');
            $teacher->firstName = $request->input('firstName');
            $teacher->phone = $request->input('phone');
            $teacher->owner_id = Auth::id();

            $teacher->save();

            return Inertia::render('Owner/Permit/Index');

        } else if($request->input('role') == "student") {

            $student = new Student;
            $student->email = $request->input('email');
            $student->lastName = $request->input('lastName');
            $student->firstName = $request->input('firstName');
            $student->phone = $request->input('phone');
            $student->owner_id = Auth::id();

            $student->save();

            return Inertia::render('Owner/Permit/Index');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if($id == 0) {
            $display = [
                'role' => 'teacher', 
                'inviteTitle' => '新しい講師への招待メール送信',
                'registerTitle' => '新しい講師の新規登録',
            ];
            return Inertia::render('Owner/Permit/Show', [
                'display' => $display,
            ]);
        } else if($id == 1) {
            $display = [
                'role' => 'student', 
                'inviteTitle' => '新しい生徒への招待メール送信',
                'registerTitle' => '新しい生徒の新規登録',
            ];
            return Inertia::render('Owner/Permit/Show', [
                'display' => $display,
            ]);
        } 
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
