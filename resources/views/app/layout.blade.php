<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('app.head')
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        @include('app.login')

        <div class="max-w-12xl mx-auto p-6 lg:p-8">

            @yield('content')

        </div>
    </div>
</body>
</html>
