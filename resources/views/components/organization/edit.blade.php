@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 border bg-dark-subtle mt-4 p-5">
                        <form class="login-form" method="POST" action="{{ route('organization.update', $organization->id) }}">
                            @csrf
                            @method('PATCH') <!-- Use 'PATCH' if your application supports it -->

                            <h3 class="text-center mb-4">Update Organization Details</h3>

                            <div class="form-group mt-4">
                                <label for="name">Organization Name</label>
                                <input type="text"
                                    class="form-control border rounded-0 @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $organization->name }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="location">Location</label>
                                <input type="text"
                                    class="form-control border rounded-0 @error('location') is-invalid @enderror"
                                    id="location" name="location" value="{{ $organization->location }}" required>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <label for="email">Email</label>
                                <input type="email"
                                    class="form-control border rounded-0 @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ $organization->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Add more attributes as needed -->

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-block cta-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
