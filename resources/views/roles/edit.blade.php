@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Role</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-2 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Role Name</label>
                <input type="text" name="name" id="name" value="{{ $role->name }}" class="border border-gray-300 p-2 w-full" required>
            </div>

            <button class="bg-blue-500 text-white px-4 py-2">Update</button>
        </form>
    </div>
@endsection
