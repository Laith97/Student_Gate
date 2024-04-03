<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\FinalController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MidController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Define the resource routes with the admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('students', StudentController::class);
});

// Define additional routes for specific actions
Route::middleware(['auth', 'admin'])->group(function () {
    // Routes for students
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

    // Routes for courses
    Route::get('/students/{student}/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/students/{student}/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/students/{student}/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/students/{student}/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/students/{student}/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/students/{student}/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/students/{student}/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    
   /* Route::get('/students/{student}/info', [InfoController::class, 'index'])->name('info.index');
    Route::get('/students/{student}/info/create', [InfoController::class, 'create'])->name('info.create');
    Route::post('/students/{student}/info', [InfoController::class, 'store'])->name('info.store');
    Route::get('/students/{student}/info/{course}', [InfoController::class, 'show'])->name('info.show');
    Route::get('/students/{student}/info/{course}/edit', [InfoController::class, 'edit'])->name('info.edit');
    Route::put('/students/{student}/info/{course}', [InfoController::class, 'update'])->name('info.update');
    Route::delete('/students/{student}/info/{course}', [InfoController::class, 'destroy'])->name('info.destroy');
    */
});

// Define a route to fetch semesters

Route::get('/get-semesters', [CourseController::class, 'getSemesters'])->name('get.semesters');

Route::get('/details', [DetailsController::class, 'show'])->name('details.show');
Route::post('/update-student-details', [DetailsController::class, 'update'])->name('update_student_details');


Route::get('/mid', [MidController::class, 'show'])->name('mid.show');

Route::get('/final', [FinalController::class, 'show'])->name('final.show');


Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->isAdmin()) {
        // If the user is an admin, redirect to the /students page
        return redirect()->route('students.index');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
