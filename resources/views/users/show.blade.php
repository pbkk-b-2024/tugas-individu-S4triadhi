@extends('layouts.master')

@section('title', 'User Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">User Details</h2>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    
    <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to Users</a>
@endsection
