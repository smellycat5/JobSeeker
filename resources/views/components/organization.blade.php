@extends('layouts.base')
@section('content')
    <section>
        <h1 class="title">Organizations:</h1>
        @if ($organizations->isEmpty())
            <p>No job cards available.</p>
        @else
            <div class="job-card-container">
                @foreach ($organizations as $organization)
                <div class="job-card">
                        <h3>{{ $organization->name }}</h3>
                        <p>{{ $organization->email }}</p>
                        <p>Location: {{ $organization->location }}</p>
                        <!-- Add more details as needed -->
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
