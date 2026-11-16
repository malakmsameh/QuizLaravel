<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CoursesController extends Controller
{
public function index()
    {
        $courses = Courses::with('lecturer.user')
            ->withCount('lectures')
            ->latest()
            ->paginate(10);

        return view('courses.index', compact('courses'));
    }

}