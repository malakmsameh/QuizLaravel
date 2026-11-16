<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained('users')->restrictOnDelete();
			$table->string('employee_number')->unique();
			$table->string('department');
			$table->string('office_room');
			$table->string('photo')->nullable();
			$table->enum('isActivated', ['isActivated', 'isDeactivated'])->default('isActivated');
			$table->string('academic_rank')->nullable();
			$table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
