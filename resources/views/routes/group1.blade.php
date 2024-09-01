@extends('layouts.main')

@section('title', 'Group Page 1')

@section('page-title', 'Group Page 1')

@section('content')
    <div class="container mt-4">
        <h1>Group Page 1</h1>
        <p>Welcome to Group Page 1.</p>

        <!-- Button to go back to Route Groups page -->
        <a href="{{ route('group') }}" class="btn btn-secondary">Back to Route Groups</a>

        <!-- Button to go back to Home -->
        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
    </div>
@endsection
