@extends('layouts.app')

@section('title', 'Lectures')

@section('content')
	<div class="mb-4 flex justify-end">
		<a href="{{ route('lectures.create') }}"
		   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
			+ New Lecture
		</a>
	</div>

	<div class="bg-white rounded-lg shadow overflow-x-auto">
		<table class="w-full text-left text-sm">
			<thead class="bg-gray-50 border-b text-gray-600 uppercase text-xs">
				<tr>
					<th class="px-4 py-3">ID</th>
					<th class="px-4 py-3">Title</th>
					<th class="px-4 py-3">Course</th>
					<th class="px-4 py-3">Lecturer</th>
					<th class="px-4 py-3 text-right">Actions</th>
				</tr>
			</thead>
			<tbody class="divide-y">
				@forelse ($lectures as $lecture)
					<tr class="hover:bg-gray-50">
						<td class="px-4 py-3">{{ $lecture->id }}</td>
						<td class="px-4 py-3 font-medium">{{ $lecture->title }}</td>
						<td class="px-4 py-3 text-gray-600">
							{{ $lecture->course->title ?? '—' }}
							@if ($lecture->course)
								<span class="text-xs text-gray-400 font-mono">
									({{ $lecture->course->course_code }})
								</span>
							@endif
						</td>
						<td class="px-4 py-3 text-gray-600">
							{{ $lecture->course->lecturer->user->name ?? '—' }}
						</td>
						<td class="px-4 py-3 text-right whitespace-nowrap">
							<a href="{{ route('lectures.show', $lecture) }}"
							   class="text-blue-600 hover:underline">View</a>
							<a href="{{ route('lectures.edit', $lecture) }}"
							   class="ml-2 text-yellow-600 hover:underline">Edit</a>
							<form action="{{ route('lectures.destroy', $lecture) }}" method="POST"
								  class="inline" onsubmit="return confirm('Delete this lecture?')">
								@csrf
								@method('DELETE')
								<button type="submit" class="ml-2 text-red-600 hover:underline">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="5" class="px-4 py-6 text-center text-gray-500">
							No lectures yet.
						</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>

	<div class="mt-4">{{ $lectures->links() }}</div>
@endsection