<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'QuizLaravel') }} - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-slate-800 text-white flex flex-col shrink-0">
            <div class="p-6 border-b border-slate-700">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold">QuizLaravel</a>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('dashboard') ? 'bg-slate-700' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('lecturers.index') }}"
                   class="block px-4 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('lecturers.*') ? 'bg-slate-700' : '' }}">
                    Lecturers
                </a>
                <a href="{{ route('courses.index') }}"
                   class="block px-4 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('courses.*') ? 'bg-slate-700' : '' }}">
                    Courses
                </a>
                <a href="{{ route('lectures.index') }}"
                   class="block px-4 py-2 rounded hover:bg-slate-700 {{ request()->routeIs('lectures.*') ? 'bg-slate-700' : '' }}">
                    Lectures
                </a>
            </nav>
            <div class="p-4 border-t border-slate-700 text-sm text-slate-400">
                {{ auth()->user()->name ?? 'Guest' }}
            </div>
        </aside>

        {{-- Main --}}
        <main class="flex-1 p-8">
            <header class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
            </header>

            {{-- Flash messages --}}
            @if (session('success'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-200">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-200">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-200">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>