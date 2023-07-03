@extends('layouts.base')
@section('content')
    <div class="job-card-container">
        <h3>{{ $organization->name }}</h3>
        <p>{{ $organization->email }}</p>
        <p>Location: {{ $organization->location }}</p>
    </div>
@endsection
