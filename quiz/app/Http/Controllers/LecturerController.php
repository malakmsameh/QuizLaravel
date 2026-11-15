<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Models\Course_user;
use App\Models\Courses;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
		$lecturers = Lecturer::where('isActivated', 'isActivated')->with('user')->withCount('courses')->get();

		return view('lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
		$users = User::whereDoesntHave('lecturer')->get();
		return view('lecturers.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$valid = $request->validate([
			'user_id'=>'required|exists:user,id|unique:lecturers,user_id',
			'employee_number'=>'required|string|unique:lecturers,employee_number',
			'department'=>'required|string|max:255',
			'office_room'=>'required|string|max:255',
			'academic_rank'=>'nullable|string|max:255',
			'isActivated'=>'required|in:isActivated,isDeactivated',
			'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);


		if ($request->hasFile('photo')) {
			$valid['photo'] = $request->file('photo')->store('lecturers', 'public');
		}

		Lecturer::create($valid);

		return redirect()->route('lecturers.index')->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        //
		$users = User::whereDoesntHave('lecturer')->orWhere('id', $lecturer->user_id)->get();
		return view('lecturers.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
		$valid = $request->validate([
			'user_id'=>'required|exists:user,id|unique:lecturers,user_id',
			'employee_number'=>'required|string|unique:lecturers,employee_number',
			'department'=>'required|string|max:255',
			'office_room'=>'required|string|max:255',
			'academic_rank'=>'nullable|string|max:255',
			'isActivated'=>'required|in:isActivated,isDeactivated',
			'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);


		if ($request->hasFile('photo'))
		{
			if ($lecturer->photo && Storage::disk('public')->exists($lecturer->photo))
			{
				Storage::disk('public')->delete($lecturer->photo);
			}
			$valid['photo'] = $request->file('photo')->store('lecturers', 'public');
		}

		Lecturer::create($valid);

		return redirect()->route('lecturers.index')->with('success', 'Product created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        //
		if ($lecturer->courses()->exists())
		{
			return redirect()->route('lecturers.index')->with('error','cannot delete this lecturer because of active courses');
		}
		$lecturer->delete();

			return redirect()->route('lecturers.index')->with('success','deleted the lecturer successfully');

    }
}
