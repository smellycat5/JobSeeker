@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-4">
                    <h3 class="top-c-sep">Explore Organizations</h3>
                    <p>A List of Organizations currently registered with us.</p>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="career-search mb-4">
                    <!-- Add organization search filters if needed -->
    
                    <div class="filter-result">
                        <p class="mb-3">Total Organizations: {{ $organizations->count() }}</p>
    
                        <!-- Organization List Start -->
                        @foreach ($organizations as $organization)
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <div class="mr-4 d-none d-md-block">
                                        <!-- Replace the placeholder with actual organization logo if available -->
                                        Logo
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="card-title">{{ $organization->name }}</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <i class="zmdi zmdi-pin mr-2"></i> {{ $organization->location }}
                                            </li>
                                            <li>
                                                <i class="zmdi zmdi-email mr-2"></i> {{ $organization->email }}
                                            </li>
                                            <!-- Add more organization attributes as needed -->
                                        </ul>
                                    </div>
                                    <div class="ml-auto">
                                        <!-- Add a link to view more details about the organization -->
                                        <a href="{{ route('organization.show', $organization->id) }}" class="btn btn-light">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Repeat the organization box structure for other organizations -->
    
                        <!-- Organization List End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
      
@endsection
