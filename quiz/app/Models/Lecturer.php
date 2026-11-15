<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// $table->id();
// $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
// $table->string('employee_number')->nullable();
// $table->string('department');
// $table->string('office_room');
// $table->string('photo');
// $table->enum('isActivated', ['isActivated', 'isDeactivated'])->default('isActivated');
// $table->timestamps();

class Lecturer extends Model
{
    /** @use HasFactory<\Database\Factories\LecturerFactory> */
    use HasFactory;

	protected $fillable = [
		'name',
		'email',
		'phone',
		'address',
		'password',
	];
}
