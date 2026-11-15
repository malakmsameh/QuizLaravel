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
		$active_lect = Lecturer::with('user')->withCount('courses')->get();
	}
}
