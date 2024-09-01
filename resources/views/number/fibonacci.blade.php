<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
</head>
<body>
    <h1>Fibonacci Sequence for n = {{ $n }}</h1>
    <ul>
        @foreach ($fibonacci as $number)
            <li>{{ $number }}</li>
        @endforeach
    </ul>
</body>
</html>
