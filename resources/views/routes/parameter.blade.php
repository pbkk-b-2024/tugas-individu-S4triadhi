@extends('layouts.main')

@section('title', 'Parameter Routing')

@section('page-title', 'Parameter Routing')

@section('content')
    <form action="{{ route('parameter.index') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="param1">Parameter 1:</label>
            <input type="text" id="param1" name="param1" class="form-control" value="{{ request('param1') }}">
        </div>
        <div class="form-group">
            <label for="param2">Parameter 2:</label>
            <input type="text" id="param2" name="param2" class="form-control" value="{{ request('param2') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if(request('param1') || request('param2'))
        <h3>Entered Parameters:</h3>
        <p>Parameter 1: {{ request('param1') }}</p>
        <p>Parameter 2: {{ request('param2') }}</p>

        <h4>Preview URL:</h4>
        <p>{{ url()->current() }}?param1={{ request('param1') }}&param2={{ request('param2') }}</p>
    @endif

    <a href="{{ route('home') }}" class="btn btn-secondary">Go Back to Pertemuan 1</a>
@endsection
