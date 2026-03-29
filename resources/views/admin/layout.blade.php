<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin Dashboard' }} - {{ config('app.name') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-body flex">
        @include('admin.partials.sidebar')
        <div class="flex-1 flex flex-column">
            @include('admin.partials.header')
            <main class="p-4">
                <div class="container">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
