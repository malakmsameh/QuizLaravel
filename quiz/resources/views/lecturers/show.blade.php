@extends('layouts.app')

@section('title', 'Lecturer Details')

@section('content')
	<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
		<div class="flex items-center gap-6 mb-6">
			@if ($lecturer->photo)
				<img src="{{ Storage::url($lecturer->photo) }}"
					 alt="{{ $lecturer->user->name ?? 'Lecturer' }}"
					 class="w-24 h-24 rounded-full object-cover border">
			@else
				<div class="w-24 h-24 rounded-full bg-slate-300 flex items-center justify-center text-slate-600 text-2xl font-bold">
					{{ strtoupper(substr($lecturer->user->name ?? '?', 0, 1)) }}
				</div>
			@endif
			<div>
				<h2 class="text-xl font-semibold text-gray-800">
					{{ $lecturer->user->name ?? '—' }}
				</h2>
				<p class="text-gray-500">{{ $lecturer->user->email ?? '—' }}</p>
				<p class="text-sm text-gray-400 mt-1">
					{{ $lecturer->academic_rank ?? 'No rank' }} · {{ $lecturer->department }}
				</p>
			</div>
		</div>

		<dl class="grid grid-cols-3 gap-y-3 text-sm">
			<dt class="text-gray-500">Employee #</dt>
			<dd class="col-span-2 font-mono">{{ $lecturer->employee_number }}</dd>

			<dt class="text-gray-500">Department</dt>
			<dd class="col-span-2">{{ $lecturer->department }}</dd>

			<dt class="text-gray-500">Academic Rank</dt>
			<dd class="col-span-2">{{ $lecturer->academic_rank ?? '—' }}</dd>

			<dt class="text-gray-500">Office Room</dt>
			<dd class="col-span-2">{{ $lecturer->office_room }}</dd>

			<dt class="text-gray-500">Status</dt>
			<dd class="col-span-2">
				@if ($lecturer->isActivated === 'isActivated')
					<span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Activated</span>
				@else
					<span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">Deactivated</span>
				@endif
			</dd>

			<dt class="text-gray-500">Assigned Courses</dt>
			<dd class="col-span-2">
				<span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
					{{ $lecturer->courses_count }}
					{{ Str::plural('course', $lecturer->courses_count) }}
				</span>
			</dd>
		</dl>

		<div class="mt-6 flex gap-2">
			<a href="{{ route('lecturers.index') }}"
			   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Back</a>
			<a href="{{ route('lecturers.edit', $lecturer) }}"
			   class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
		</div>
	</div>
@endsection