@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
    <form action="{{ route('courses.store') }}" method="POST" class="bg-white rounded-lg shadow p-6 max-w-2xl space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Lecturer</label>
            <select name="lecturer_id" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="">— Select lecturer —</option>
                @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}" {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->user->name ?? 'Lecturer #' . $lecturer->id }} ({{ $lecturer->department }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Course Code</label>
                <input type="text" name="course_code" value="{{ old('course_code') }}"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Credit Hours</label>
                <input type="number" name="credit_hours" value="{{ old('credit_hours', 3) }}" min="1"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Semester</label>
                <input type="text" name="semester" value="{{ old('semester') }}" placeholder="e.g. 2026-Spring"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('courses.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
@endsection