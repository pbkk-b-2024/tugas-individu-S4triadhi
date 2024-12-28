<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">

    <!-- Header -->
    @include('components.header')

    <div class="flex flex-1">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    @include('components.footer')

</body>
</html>
