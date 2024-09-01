<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genap dan Ganjil</title>
</head>
<body>
    <h1>Genap dan Ganjil for n = {{ $n }}</h1>
    <ul>
        @foreach ($numbers as $number)
            <li>{{ $number['number'] }} is {{ $number['type'] }}</li>
        @endforeach
    </ul>
</body>
</html>
