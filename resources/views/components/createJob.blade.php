@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 border bg-dark-subtle mt-4 p-5">
                        <form class="login-form" method="POST" action="{{ route('job.store') }}">
                            <h3 class="text-center mb-4">Create a Job Listing</h3>

                            @csrf

                            <div class="form-group mt-4">
                                <label for="title">Job Title</label>
                                <input type="title"
                                    class="form-control border rounded-0 @error('title') is-invalid @enderror"
                                    id="title" name="title" required autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="location">Location</label>
                                <input type="text"
                                    class="form-control border rounded-0 @error('location') is-invalid @enderror"
                                    id="location" name="location" required>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="description">Job Description</label>
                                <textarea class="form-control border rounded-0 @error('description') is-invalid @enderror" id="description"
                                    name="description" required></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="salary">Salary</label>
                                <input type="number"
                                    class="form-control border rounded-0 @error('salary') is-invalid @enderror"
                                    id="salary" name="salary" required>
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="organization_id">Organization</label>
                                <select class="form-control border rounded-0 @error('organization_id') is-invalid @enderror"
                                    id="organization_id" name="organization_id" required>
                                    <option value="#" selected disabled>Select an organization</option>
                                    @foreach ($organizations as $organization)
                                        {
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                        }
                                        <!-- Add more options as needed -->
                                        @endforeach
                                </select>
                                @error('organization_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-block cta-button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
