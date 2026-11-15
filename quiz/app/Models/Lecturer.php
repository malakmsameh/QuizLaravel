<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lecturer extends Model
{
    /** @use HasFactory<\Database\Factories\LecturerFactory> */
    use HasFactory,SoftDeletes;

	protected $fillable = [
		'user_id',
		'employee_number',
		'department',
		'office_room',
		'photo',
		'isActivated',
		'academic_rank',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function courses()
	{
		return $this->hasMany(Courses::class,'lecturer_id');
	}

}
