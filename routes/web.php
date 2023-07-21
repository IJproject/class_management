<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia::render('Home');
})->name('home');

// require __DIR__.'/auth.php';


// 管理者用のルーティング
Route::prefix('owner')->name('owner.')->group(function() {

    Route::middleware('auth:owner')->group(function () {

        Route::get('/dashboard', function() {
            return Inertia::render('Owner/Dashboard');
        })->name('dashboard');

        Route::resource('/lesson', 'App\Http\Controllers\Owner\OwnerTopController')
        ->only(['index', 'show']);

        Route::resource('/agreement', 'App\Http\Controllers\Owner\OwnerAgreementController');

        Route::resource('/news', 'App\Http\Controllers\Owner\OwnerNewsController');

        Route::resource('/permit', 'App\Http\Controllers\Owner\OwnerPermitController');

        Route::resource('/schedule', 'App\Http\Controllers\Owner\OwnerScheduleController');

        Route::resource('/transfer', 'App\Http\Controllers\Owner\OwnerTransferController');

    });

    require __DIR__.'/owner.php';
});


// 講師用のルーティング
Route::prefix('teacher')->name('teacher.')->group(function() {

    Route::middleware('auth:teacher')->group(function () {

        // Route::get('/dashboard', function() {
        //     return Inertia::render('Teacher/Dashboard');
        // })->name('dashboard');

        Route::resource('/lesson', 'App\Http\Controllers\Teacher\TeacherTopController')
        ->only(['index', 'show']);

        Route::resource('/shift', 'App\Http\Controllers\Teacher\TeacherShiftApplyController');

        Route::resource('/news', 'App\Http\Controllers\Teacher\TeacherNewsController');
    
    });

    require __DIR__.'/teacher.php';
});


// 生徒用のルーティング
Route::prefix('student')->name('student.')->group(function() {

    Route::middleware('auth:student')->group(function () {

        // Route::get('/dashboard', function() {
        //     return Inertia::render('Student/Dashboard');
        // })->name('dashboard');

        Route::resource('/lesson', 'App\Http\Controllers\Student\StudentTopController')
        ->only(['index', 'show']);

        Route::resource('/apply', 'App\Http\Controllers\Student\StudentApplyController');

        Route::resource('/news', 'App\Http\Controllers\Student\StudentNewsController')
        ->only(['index', 'show']);
    
    });

    require __DIR__.'/student.php';
});
