@extends('layouts.app')

@section('title', 'Edit Lecturer')

@section('content')
	<div class="bg-white rounded-lg shadow p-6 max-w-xl">
		<form action="{{ route('lecturers.update', $lecturer) }}"
			  method="POST"
			  enctype="multipart/form-data"
			  class="space-y-4">
			@csrf
			@method('PUT')

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">User Account</label>
				<select name="user_id" required
						class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
					@foreach ($users as $user)
						<option value="{{ $user->id }}"
							@selected(old('user_id', $lecturer->user_id) == $user->id)>
							{{ $user->name }} ({{ $user->email }})
						</option>
					@endforeach
				</select>
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Employee Number</label>
				<input type="text" name="employee_number"
					   value="{{ old('employee_number', $lecturer->employee_number) }}" required
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
				<input type="text" name="department"
					   value="{{ old('department', $lecturer->department) }}" required
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Office Room</label>
				<input type="text" name="office_room"
					   value="{{ old('office_room', $lecturer->office_room) }}" required
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Academic Rank</label>
				<input type="text" name="academic_rank"
					   value="{{ old('academic_rank', $lecturer->academic_rank) }}"
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
				<select name="isActivated" required
						class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
					<option value="isActivated"
						@selected(old('isActivated', $lecturer->isActivated) === 'isActivated')>Activated</option>
					<option value="isDeactivated"
						@selected(old('isActivated', $lecturer->isActivated) === 'isDeactivated')>Deactivated</option>
				</select>
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo</label>
				@if ($lecturer->photo)
					<div class="flex items-center gap-3 mb-2">
						<img src="{{ Storage::url($lecturer->photo) }}"
							 alt="Current photo"
							 class="w-16 h-16 rounded-full object-cover border">
						<span class="text-xs text-gray-500">Current photo — upload new to replace</span>
					</div>
				@else
					<p class="text-xs text-gray-500 mb-2">No photo uploaded yet.</p>
				@endif
				<input type="file" name="photo" accept="image/*"
					   class="w-full border border-gray-300 rounded px-3 py-2">
				<p class="text-xs text-gray-500 mt-1">Leave empty to keep the current photo.</p>
			</div>

			<div class="flex gap-2 pt-2">
				<button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
					Update Lecturer
				</button>
				<a href="{{ route('lecturers.index') }}"
				   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
			</div>
		</form>
	</div>
@endsection