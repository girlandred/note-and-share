<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="bg-gray-100 relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-dots-lighter selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
            <div class="flex flex-col items-center justify-center p-6 mx-auto space-y-4 text-center max-w-7x1 lg:p-8">
                    <x-button primary xl href="{{ route('register') }}">Get started</x-button>
            </div>
        </div>
    </body>
</html>
