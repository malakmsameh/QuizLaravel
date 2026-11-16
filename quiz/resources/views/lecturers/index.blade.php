@extends('layouts.app')

@section('title', 'Lecturers')

@section('content')
	<div class="mb-4 flex justify-end">
		<a href="{{ route('lecturers.create') }}"
		   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
			+ New Lecturer
		</a>
	</div>

	<div class="bg-white rounded-lg shadow overflow-x-auto">
		<table class="w-full text-left text-sm">
			<thead class="bg-gray-50 border-b text-gray-600 uppercase text-xs">
				<tr>
					<th class="px-4 py-3">Photo</th>
					<th class="px-4 py-3">Name</th>
					<th class="px-4 py-3">Email</th>
					<th class="px-4 py-3">Employee #</th>
					<th class="px-4 py-3">Department</th>
					<th class="px-4 py-3">Rank</th>
					<th class="px-4 py-3">Office</th>
					<th class="px-4 py-3 text-center">Courses</th>
					<th class="px-4 py-3 text-right">Actions</th>
				</tr>
			</thead>
			<tbody class="divide-y">
				@forelse ($lecturers as $lecturer)
					<tr class="hover:bg-gray-50">
						<td class="px-4 py-3">
							@if ($lecturer->photo)
								<img src="{{ Storage::url($lecturer->photo) }}"
									 alt="{{ $lecturer->user->name ?? 'Lecturer' }}"
									 class="w-10 h-10 rounded-full object-cover">
							@else
								<div class="w-10 h-10 rounded-full bg-slate-300 flex items-center justify-center text-slate-600 text-xs font-bold">
									{{ strtoupper(substr($lecturer->user->name ?? '?', 0, 1)) }}
								</div>
							@endif
						</td>
						<td class="px-4 py-3 font-medium">{{ $lecturer->user->name ?? '—' }}</td>
						<td class="px-4 py-3 text-gray-600">{{ $lecturer->user->email ?? '—' }}</td>
						<td class="px-4 py-3 font-mono">{{ $lecturer->employee_number }}</td>
						<td class="px-4 py-3">{{ $lecturer->department }}</td>
						<td class="px-4 py-3">{{ $lecturer->academic_rank ?? '—' }}</td>
						<td class="px-4 py-3">{{ $lecturer->office_room }}</td>
						<td class="px-4 py-3 text-center">
							<span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
								{{ $lecturer->courses_count }}
							</span>
						</td>
						<td class="px-4 py-3 text-right whitespace-nowrap">
							<a href="{{ route('lecturers.show', $lecturer) }}"
							   class="text-blue-600 hover:underline">View</a>
							<a href="{{ route('lecturers.edit', $lecturer) }}"
							   class="ml-2 text-yellow-600 hover:underline">Edit</a>
							<form action="{{ route('lecturers.destroy', $lecturer) }}"
								  method="POST" class="inline"
								  onsubmit="return confirm('Delete this lecturer?')">
								@csrf
								@method('DELETE')
								<button type="submit" class="ml-2 text-red-600 hover:underline">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="9" class="px-4 py-6 text-center text-gray-500">
							No lecturers yet.
						</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>

	<div class="mt-4">{{ $lecturers->links() }}</div>
@endsection