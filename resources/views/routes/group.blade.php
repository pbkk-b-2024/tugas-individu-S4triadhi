@extends('layouts.main')

@section('title', 'Route Groups')

@section('page-title', 'Route Groups')

@section('content')
    <p>Beberapa contoh dari Route Groups</p>

    <!-- Add buttons for Group Page 1 and Group Page 2 -->
    <div class="btn-group">
        <a href="{{ route('group.page1') }}" class="btn btn-primary">Group Page 1</a>
        <a href="{{ route('group.page2') }}" class="btn btn-primary">Group Page 2</a>
    </div>
@endsection
