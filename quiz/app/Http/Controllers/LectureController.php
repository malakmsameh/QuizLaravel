<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Courses;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::with('course.lecturer.user')
            ->latest()
            ->paginate(10);

        return view('lectures.index', compact('lectures'));
    }
}