<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Courses extends Model
{
	/** @use HasFactory<\Database\Factories\CoursesFactory> */
    use HasFactory;

		protected $fillable = [
		'lecturer_id',
		'course_code',
		'title',
		'credit_hours',
		'semester',
	];

	public function lecturer()
	{
		return $this->belongsTo(Lecturer::class,'lecturer_id');
	}

	public function lectures()
	{
		return $this->hasMany(Lecture::class, 'course_id');
	}

	// public function users()
	// {
	// 	return $this->belongsToMany(User::class, 'course_user')->withPivot('enrollment_date', 'grade')->withTimestamps();
	// }


	public function users()
	{
		return $this->belongsToMany(
			User::class,
			'course_user',
			'course_id',
			'user_id'
		)->withPivot('enrollment_date', 'grade')->withTimestamps();
	}

}
