@extends('layouts.app')

@section('title', 'New Lecturer')

@section('content')
	<div class="bg-white rounded-lg shadow p-6 max-w-xl">
		<form action="{{ route('lecturers.store') }}"
			  method="POST"
			  enctype="multipart/form-data"
			  class="space-y-4">
			@csrf

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">User Account</label>
				<select name="user_id" required
						class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
					<option value="">— Select a user —</option>
					@foreach ($users as $user)
						<option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
							{{ $user->name }} ({{ $user->email }})
						</option>
					@endforeach
				</select>
				@if ($users->isEmpty())
					<p class="text-xs text-amber-600 mt-1">
						All existing users already have lecturer profiles.
					</p>
				@endif
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Employee Number</label>
				<input type="text" name="employee_number" value="{{ old('employee_number') }}" required
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
				<input type="text" name="department" value="{{ old('department') }}" required
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Office Room</label>
				<input type="text" name="office_room" value="{{ old('office_room') }}" required
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Academic Rank</label>
				<input type="text" name="academic_rank" value="{{ old('academic_rank') }}"
					   placeholder="e.g. Senior Lecturer"
					   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
				<select name="isActivated" required
						class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
					<option value="isActivated" @selected(old('isActivated', 'isActivated') === 'isActivated')>Activated</option>
					<option value="isDeactivated" @selected(old('isActivated') === 'isDeactivated')>Deactivated</option>
				</select>
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo (optional)</label>
				<input type="file" name="photo" accept="image/*"
					   class="w-full border border-gray-300 rounded px-3 py-2">
				<p class="text-xs text-gray-500 mt-1">JPEG/PNG/GIF, max 2 MB.</p>
			</div>

			<div class="flex gap-2 pt-2">
				<button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
					Save Lecturer
				</button>
				<a href="{{ route('lecturers.index') }}"
				   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
			</div>
		</form>
	</div>
@endsection