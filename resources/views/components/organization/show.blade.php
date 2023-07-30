@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-4 d-flex align-items-center justify-content-center">
                    <div class="mr-4">
                        <!-- Replace the placeholder with actual organization logo if available -->
                        Logo
                    </div>
                    <div>
                        <h3 class="top-c-sep">{{ $organization->name }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="organization-details mb-4">
                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-center">
                           
                            <div class="flex-grow-1">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <i class="fa fa-envelope ml-1 mr-1"></i> {{ $organization->email }}
                                    </li>

                                    <li>
                                        <i class="fa fa-map-marker ml-2 mr-1"></i></i> {{ $organization->location }}
                                    </li>
                                  
                                    <li>
                                        <p class="fw-semibold pt-4"> About the Company:</p>
                                        {{ $organization->description }}
                                    </li>   
                                    <!-- Add more organization attributes as needed -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Add more organization details here -->
                    <!-- For example, you can display additional information about the organization -->
                    <!-- You can also add a button to edit the organization details -->

                </div>
            </div>
        </div>
    </div>

@endsection
