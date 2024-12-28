@extends('layouts.master')

@section('title', 'Role Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Role Details</h2>

    <p><strong>Name:</strong> {{ $role->name }}</p>

    <a href="{{ route('roles.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mt-4 inline-block">Back to List</a>
@endsection
