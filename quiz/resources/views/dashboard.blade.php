@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
            <h3 class="text-sm font-medium text-gray-500 uppercase">Total Lecturers</h3>
            <p class="mt-2 text-3xl font-bold text-gray-800">{{ $total_Lecturers }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
            <h3 class="text-sm font-medium text-gray-500 uppercase">Total Courses</h3>
            <p class="mt-2 text-3xl font-bold text-gray-800">{{ $total_Courses }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
            <h3 class="text-sm font-medium text-gray-500 uppercase">Total Lectures</h3>
            <p class="mt-2 text-3xl font-bold text-gray-800">{{ $total_Lectures }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-500">
            <h3 class="text-sm font-medium text-gray-500 uppercase">Total Active Student Enrollments</h3>
            <p class="mt-2 text-3xl font-bold text-gray-800">{{ $total_Enrollments }}</p>
        </div>
    </div>
@endsection