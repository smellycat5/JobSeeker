@extends('layouts.base')
@section('content')
    <section>
        <div class="flex application">
            <form method="post" action="#" class="login-form">
                <div>
                    <h1 class="center-text"><strong> Application Form</strong></h1>
                </div>
                @csrf
                <div class="mt-5">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="mt-5">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="mt-5">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="mt-5">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="mt-5">
                    <label for="education">Highest Level of Education:</label>
                    <input type="text" id="education" name="education" required>
                </div>
                <div class="mt-5">
                    <label for="institution">Name of Institution:</label>
                    <input type="text" id="institution" name="institution" required>
                </div>
                <div class="mt-5">
                    <label for="graduation_year">Year of Graduation:</label>
                    <input type="number" id="graduation_year" name="graduation_year" required>
                </div>

                <!-- Add more fields as needed for the application form -->

                <button type="submit">Submit Application</button>
            </form>
        </div>
    </section>
@endsection
