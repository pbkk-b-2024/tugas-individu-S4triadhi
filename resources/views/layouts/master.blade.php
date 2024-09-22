<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 h-screen flex flex-col">

    <!-- Header -->
    <x-header />

    <div class="flex-1 flex">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <x-footer />

</body>
</html>
