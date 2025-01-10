<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="antialiased">
    <div class="relative flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="w-96 h-96 bg-gradient-to-tr from-red-400 to-pink-500 opacity-40 rounded-full blur-3xl absolute top-10 left-10 animate-pulse"></div>
            <div class="w-96 h-96 bg-gradient-to-bl from-blue-400 to-indigo-500 opacity-40 rounded-full blur-3xl absolute bottom-10 right-10 animate-pulse"></div>
        </div>

        <!-- Content -->
        <div class="z-10 max-w-lg px-8 py-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-gray-200 dark:ring-gray-700">
            @if (Route::has('login'))
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Welcome to Central App</h1>
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-lg font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500 focus:rounded">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-lg font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500 focus:rounded">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-lg font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500 focus:rounded">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif

            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Welcome to your tenant's dedicated Laravel application! Explore the features and manage your resources efficiently.</p>

            <!-- CTA Button -->
            <div class="mt-6">
                <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-700 font-medium text-lg rounded-lg shadow-md transition-all duration-200">Get Started</a>
            </div>
        </div>
    </div>
</body>

</html>
