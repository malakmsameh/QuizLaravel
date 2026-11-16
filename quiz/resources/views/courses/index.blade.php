@extends('layouts.app')

@section('title', 'Courses')

@section('content')
	<div class="mb-4 flex justify-end">
		<a href="{{ route('courses.create') }}"
		   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
			+ New Course
		</a>
	</div>

	<div class="bg-white rounded-lg shadow overflow-x-auto">
		<table class="w-full text-left text-sm">
			<thead class="bg-gray-50 border-b text-gray-600 uppercase text-xs">
				<tr>
					<th class="px-4 py-3">Code</th>
					<th class="px-4 py-3">Title</th>
					<th class="px-4 py-3">Lecturer</th>
					<th class="px-4 py-3 text-center">Credits</th>
					<th class="px-4 py-3">Semester</th>
					<th class="px-4 py-3 text-center">Lectures</th>
					<th class="px-4 py-3 text-right">Actions</th>
				</tr>
			</thead>
			<tbody class="divide-y">
				@forelse ($courses as $course)
					<tr class="hover:bg-gray-50">
						<td class="px-4 py-3 font-mono">{{ $course->course_code }}</td>
						<td class="px-4 py-3 font-medium">{{ $course->title }}</td>
						<td class="px-4 py-3 text-gray-600">
							{{ $course->lecturer->user->name ?? '—' }}
						</td>
						<td class="px-4 py-3 text-center">{{ $course->credit_hours }}</td>
						<td class="px-4 py-3">{{ $course->semester }}</td>
						<td class="px-4 py-3 text-center">
							<span class="inline-block bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">
								{{ $course->lectures_count }}
							</span>
						</td>
						<td class="px-4 py-3 text-right whitespace-nowrap">
							<a href="{{ route('courses.show', $course) }}"
							   class="text-blue-600 hover:underline">View</a>
							<a href="{{ route('courses.edit', $course) }}"
							   class="ml-2 text-yellow-600 hover:underline">Edit</a>
							<form action="{{ route('courses.destroy', $course) }}" method="POST"
								  class="inline" onsubmit="return confirm('Delete this course?')">
								@csrf
								@method('DELETE')
								<button type="submit" class="ml-2 text-red-600 hover:underline">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="7" class="px-4 py-6 text-center text-gray-500">
							No courses yet.
						</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>

	<div class="mt-4">{{ $courses->links() }}</div>
@endsection