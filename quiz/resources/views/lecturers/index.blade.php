@extends('layouts.app')

@section('title', 'Lecturers')

@section('content')
    <div class="mb-4 flex justify-end">
        <a href="{{ route('lecturers.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + New Lecturer
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Employee #</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Department</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Office</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Courses</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($lecturers as $lecturer)
                    <tr>
                        <td class="px-6 py-4">
                            @if ($lecturer->photo)
                                <img src="{{ asset('storage/' . $lecturer->photo) }}"
                                     alt="{{ $lecturer->user->name }}"
                                     class="h-10 w-10 rounded-full object-cover">
                            @else
                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                                    {{ strtoupper(substr($lecturer->user->name ?? '?', 0, 1)) }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $lecturer->user->name ?? '—' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lecturer->employee_number ?? '—' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lecturer->department }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lecturer->office_room }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lecturer->courses_count }}</td>
                        <td class="px-6 py-4 text-right text-sm space-x-2">
                            <a href="{{ route('lecturers.show', $lecturer) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('lecturers.edit', $lecturer) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('lecturers.destroy', $lecturer) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Delete this lecturer?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No lecturers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection