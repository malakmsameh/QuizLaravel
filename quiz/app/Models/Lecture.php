<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lecture extends Model
{
    /** @use HasFactory<\Database\Factories\LectureFactory> */
    use HasFactory;

	protected $fillable = [
	'course_id',
	'title',
	'topic_summary',
	'hall_name',
	'scheduled_at',
	];

	public function course_lecture()
	{
		return $this->belongsTo(Courses::class,'course_id');
	}


}
