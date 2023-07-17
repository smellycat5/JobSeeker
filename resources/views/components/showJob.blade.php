@extends('layouts.base')
@section('content')
    <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Job Listing') }}
    </h2>
    <div class="job-card-container">
        <div class="job-detail">
            <h2 class="text-lg font-semibold">{{ $job->title }}</h2>
            <p class="text-gray-600">Company: {{ $job->company }}</p>
            <p class="text-gray-600">Location: {{ $job->location }}</p>
            <p class="text-gray-600">Salary: {{ $job->salary }}</p>
            <p class="text-gray-600">Description: {{ $job->description }}</p>
        </div>
        <div class="flex justify-center">
            <a href="{{ redirect('home')  }}" class="cta-button">Apply</a>   
        </div>
    </div>
@endsection
