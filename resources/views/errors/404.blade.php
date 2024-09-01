<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <style>
        .error-page {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .error-content {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="hold-transition">
    <div class="error-page">
        <div class="error-content">
            <h1 class="text-danger">404</h1>
            <h2>Not Found</h2>
            <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
