<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_user;
use App\Models\Courses;
use App\Models\Lecture;
use App\Models\Lecturer;
use App\Models\User;

class DashboardController extends Controller
{
    //
	public function index()
	{
		$total_Lecturers = Lecturer::count();

		$total_Courses = Courses::count();

		$total_Lectures = Lecture::count();

		$total_Enrollments = Course_user::count();

		return view('dashboard', compact('total_Lecturers', 'total_Courses', 'total_Lectures', 'total_Enrollments'));
	}
}
