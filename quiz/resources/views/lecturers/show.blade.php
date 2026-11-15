@extends('layouts.app')

@section('title', 'Lecturer Details')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-3xl">
        <div class="flex items-start gap-6">
            @if ($lecturer->photo)
                <img src="{{ asset('storage/' . $lecturer->photo) }}" class="h-24 w-24 rounded-full object-cover">
            @else
                <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-2xl">
                    {{ strtoupper(substr($lecturer->user->name ?? '?', 0, 1)) }}
                </div>
            @endif
            <div class="flex-1 space-y-2">
                <h2 class="text-xl font-semibold">{{ $lecturer->user->name ?? '—' }}</h2>
                <p class="text-gray-600">{{ $lecturer->user->email ?? '—' }}</p>
                <p><span class="font-medium">Employee #:</span> {{ $lecturer->employee_number ?? '—' }}</p>
                <p><span class="font-medium">Department:</span> {{ $lecturer->department }}</p>
                <p><span class="font-medium">Office:</span> {{ $lecturer->office_room }}</p>
                <p><span class="font-medium">Academic Rank:</span> {{ $lecturer->academic_rank ?? '—' }}</p>
                <p><span class="font-medium">Status:</span> {{ $lecturer->isActivated }}</p>
            </div>
        </div>

        <h3 class="mt-8 mb-2 text-lg font-semibold">Courses ({{ $lecturer->courses->count() }})</h3>
        <ul class="divide-y divide-gray-200 border rounded">
            @forelse ($lecturer->courses as $course)
                <li class="px-4 py-2 flex justify-between">
                    <span>{{ $course->course_code }} — {{ $course->title }}</span>
                    <a href="{{ route('courses.show', $course) }}" class="text-blue-600 hover:underline">View</a>
                </li>
            @empty
                <li class="px-4 py-2 text-gray-500">No courses assigned.</li>
            @endforelse
        </ul>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('lecturers.edit', $lecturer) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            <a href="{{ route('lecturers.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Back</a>
        </div>
    </div>
@endsection