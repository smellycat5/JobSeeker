@extends('layouts.base')
@section('content')
<div class="container border py-5 mt-5">
    <div class="row">
        <!-- Left Column - List of Jobs -->
        <div class="col-md-4">
            <h2 class="text-2xl font-semibold mb-4">List of Jobs</h2>
            <ul class="list-group list-group-flush">
                @foreach($jobs as $job)
                <li class="list-group-item list-group-item-action ml-0 mr-0"
                    onclick="showJobDetails({{ $job['id'] }})">
                    {{ $job['title'] }}
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Right Column - Selected Job's Details -->
        <div class="col-md-8">
            <div class="card rounded-lg border p-3" id="jobDetails" style="display:none;">
                <!-- The details of the selected job will be displayed here dynamically -->
                <h2 class="text-2xl font-semibold mb-4" id="jobTitle"></h2>
                <p class="font-bold" id="jobTitle"></p>
                <p class="text-2l font-bold">Job Description:</p>
                <p class="mt-2" id="jobDescription"></p>
                <p class="mt-2" id="jobSalary"></p>
                <p class="mt-2" id="jobLocation"></p>

            </div>
        </div>
    </div>
</div>

<script>
    // Function to show job details
    function showJobDetails(jobId) {
        const job = @json($jobs);
        const selectedJob = job.find((job) => job.id === jobId);

        document.getElementById('jobTitle').innerText = selectedJob.title;
        document.getElementById('jobDescription').innerText = selectedJob.description;
        document.getElementById('jobSalary').innerText = selectedJob.salary;
        document.getElementById('jobLocation').innerText = selectedJob.location;
        // document.getElementById('jobOrganization').innerText = selectedJob.organization;


        // Show the right column containing job details
        document.getElementById('jobDetails').style.display = 'block';
    }
</script>
@endsection
