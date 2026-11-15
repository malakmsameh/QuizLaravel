<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_user extends Model
{
    /** @use HasFactory<\Database\Factories\CourseUserFactory> */
    use HasFactory;

	protected $table = 'course_user';

	protected $fillable = [
	'user_id',
	'course_id',
	'enrollment_date',
	'grade',
	];


	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function course()
	{
		return $this->belongsTo(Courses::class);
	}


	// public function users_courses()
	// {
	// 	return $this->belongsToMany(User::class);
	// }
}
