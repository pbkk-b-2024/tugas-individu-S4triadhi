<h1>Prima Check for n = {{ $n }}</h1>
<ul>
    @foreach ($numbers as $number)
        <li>{{ $number['number'] }} is {{ $number['is_prime'] ? 'Prima' : 'Bukan Prima' }}</li>
    @endforeach
</ul>
