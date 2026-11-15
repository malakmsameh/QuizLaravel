@extends('layouts.app')

@section('title', 'Create Lecturer')

@section('content')
    <form action="{{ route('lecturers.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white rounded-lg shadow p-6 max-w-2xl space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">User</label>
            <select name="user_id" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="">— Select user —</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Employee Number</label>
                <input type="text" name="employee_number" value="{{ old('employee_number') }}"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Department</label>
                <input type="text" name="department" value="{{ old('department') }}"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Office Room</label>
                <input type="text" name="office_room" value="{{ old('office_room') }}"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Academic Rank</label>
                <input type="text" name="academic_rank" value="{{ old('academic_rank') }}"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="isActivated" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
                    <option value="isActivated" {{ old('isActivated') == 'isActivated' ? 'selected' : '' }}>Activated</option>
                    <option value="isDeactivated" {{ old('isActivated') == 'isDeactivated' ? 'selected' : '' }}>Deactivated</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" name="photo" accept="image/*"
                       class="mt-1 w-full text-sm text-gray-700">
            </div>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('lecturers.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
@endsection