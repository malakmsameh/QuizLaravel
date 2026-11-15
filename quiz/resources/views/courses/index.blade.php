@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <div class="mb-4 flex justify-end">
        <a href="{{ route('courses.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + New Course
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Code</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lecturer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Credits</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Semester</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($courses as $course)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $course->course_code }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $course->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $course->lecturer->user->name ?? '—' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $course->credit_hours }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $course->semester }}</td>
                        <td class="px-6 py-4 text-right text-sm space-x-2">
                            <a href="{{ route('courses.show', $course) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('courses.edit', $course) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Delete this course?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection