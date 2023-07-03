@extends('layouts.base')
@section('content')
    <section>
        <p>{{ auth()->user()->name }}</p>
        @if ($jobs->isEmpty())
            <p>No job cards available.</p>
        @else
            <div class="job-card-container">
                @foreach ($jobs as $job)
                    <div class="job-card">
                        <h3>{{ $job->title }}</h3>
                        <p>{{ $job->description }}</p>
                        <p>Location: {{ $job->location }}</p>
                        <!-- Add more details as needed -->
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
