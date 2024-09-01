@extends('layouts.main')

@section('title', 'Parameter Routing')

@section('page-title', 'Parameter Routing')

@section('content')
    <!-- Form untuk Parameter 1 -->
    <form action="{{ route('parameter.update', ['param1' => $param1, 'param2' => $param2]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="param1">Parameter 1:</label>
            <input type="text" id="param1" name="param1" class="form-control" value="{{ old('param1', $param1) }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit Parameter 1</button>
    </form>

    <!-- Form untuk Parameter 2 -->
    <form action="{{ route('parameter.update', ['param1' => $param1, 'param2' => $param2]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="param2">Parameter 2:</label>
            <input type="text" id="param2" name="param2" class="form-control" value="{{ old('param2', $param2) }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit Parameter 2</button>
    </form>

    @if($param1 || $param2)
        <h3>Entered Parameters:</h3>
        <p>Parameter 1: {{ $param1 }}</p>
        <p>Parameter 2: {{ $param2 }}</p>

        <h4>Preview URL:</h4>
        <p>{{ url('/parameter/' . urlencode($param1) . '/' . urlencode($param2)) }}</p>
    @endif

    <a href="{{ route('home') }}" class="btn btn-secondary">Go Back to Pertemuan 1</a>
@endsection
