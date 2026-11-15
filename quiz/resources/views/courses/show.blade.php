@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-3xl space-y-4">
        <div>
            <h2 class="text-xl font-semibold">{{ $course->course_code }} — {{ $course->title }}</h2>
            <p class="text-gray-600">Taught by {{ $course->lecturer->user->name ?? '—' }}</p>
        </div>
        <div class="grid grid-cols-2 gap-4 text-sm">
            <p><span class="font-medium">Credits:</span> {{ $course->credit_hours }}</p>
            <p><span class="font-medium">Semester:</span> {{ $course->semester }}</p>
        </div>

        <h3 class="mt-6 mb-2 text-lg font-semibold">Lectures ({{ $course->lectures->count() }})</h3>
        <ul class="divide-y divide-gray-200 border rounded">
            @forelse ($course->lectures as $lecture)
                <li class="px-4 py-2 flex justify-between">
                    <span>{{ $lecture->title }} — {{ $lecture->hall_name }} @ {{ $lecture->scheduled_at }}</span>
                    <a href="{{ route('lectures.show', $lecture) }}" class="text-blue-600 hover:underline">View</a>
                </li>
            @empty
                <li class="px-4 py-2 text-gray-500">No lectures scheduled.</li>
            @endforelse
        </ul>

        <h3 class="mt-6 mb-2 text-lg font-semibold">Enrolled Students ({{ $course->users->count() }})</h3>
        <ul class="divide-y divide-gray-200 border rounded">
            @forelse ($course->users as $student)
                <li class="px-4 py-2 flex justify-between">
                    <span>{{ $student->name }} ({{ $student->email }})</span>
                    <span class="text-sm text-gray-500">
                        Grade: {{ $student->pivot->grade ?? '—' }}
                    </span>
                </li>
            @empty
                <li class="px-4 py-2 text-gray-500">No students enrolled.</li>
            @endforelse
        </ul>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('courses.edit', $course) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            <a href="{{ route('courses.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Back</a>
        </div>
    </div>
@endsection