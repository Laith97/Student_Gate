<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DetailsController;
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
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
});

Route::get('/details', [DetailsController::class, 'show'])->name('details.show');
Route::post('/update-student-details', [DetailsController::class, 'update'])->name('update_student_details');


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
