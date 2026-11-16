<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LectureController;
// use App\Http\Controllers\CourseUserController;


// Dashboard — spec says "/" is the Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Lecturers — full CRUD
Route::resource('lecturers', LecturerController::class);

// Courses — connected pages (index/create/store/show/edit/update/destroy)
Route::resource('courses', CoursesController::class);

// Lectures — connected pages
Route::resource('lectures', LectureController::class);