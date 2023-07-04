@extends('layouts.base')
@section('content')
<div class="content-container">
    <section>
        <div class="container">
            <form class="login-form" method="POST" action="{{ route('job.store') }}">
                <h3 class="center-text">Enter Organization Details</h3>
                
                @csrf
                
                <div>
                    
                    <input class="mt-4" type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required
                    autofocus>
                </div>
                
                <div>
                    <input class="mt-4"type="text" id="location" name="location" placeholder="Location" value="{{ old('location') }}"
                    required>
                </div>
                
                <div>
                    <input class="mt-4" type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
