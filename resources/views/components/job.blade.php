@extends('layouts.base')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-4">
                <h3 class="top-c-sep">Job Listings</h3>
                <p>Explore the Latest Job Opportunities.</p>
                <p>
                    <span>Looking for Ideal Candidates for your Organization? <a href="{{ route('job.create') }}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Post a Job</a> opening to find one!</span>
                </p>
            </div>
        </div>
    </div>

    <div class="row border py-4">
        <div class="col-lg-4">
            <div class="job-search mb-4">
                <!-- Add job search filters if needed -->

                <div class="filter-result">
                    <p class="mb-3">Total Job Openings: {{ $jobs->count() }}</p>

                    <!-- Job List Start -->
                    @foreach ($jobs as $job)
                        <div class="card mb-3" onclick="showJobDetails({{ $job['id'] }})">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <i class="zmdi zmdi-pin mr-2"></i> {{ $job->organization->name }}
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-pin mr-2"></i> Location: {{ $job->location }}
                                    </li>
                                    <!-- Add more job attributes as needed -->
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <!-- Repeat the job box structure for other job listings -->

                    <!-- Job List End -->
                </div>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="card rounded-lg border p-3" id="jobDetails" style="display:none;">
                <!-- The details of the selected job will be displayed here dynamically -->
                <h2 class="text-2xl font-semibold mb-4" id="jobTitle"></h2>
                <p class="font-bold" id="jobTitle"></p>
                <p class="font-bold">
                    <span id="jobOrganization"></span>
                    <span> ,</span>

                    <span class="ml-2" id="jobLocation"></span>
                </p>
                <p class="text-2l"><b>Job Description:</b></p>
                <p class="mt-2" id="jobDescription"></p>
                <p class="mt-2">
                    <span>Salary:</span>
                    <span id="jobSalary"></span>
                </p>

                <div class="flex justify-center">
                    <a href="{{ route('apply', $job->id)  }}" class="cta-button">Apply</a>   
                </div>
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
        document.getElementById('jobOrganization').innerText = selectedJob.organization.name;


        // Show the right column containing job details
        document.getElementById('jobDetails').style.display = 'block';
    }
</script>
@endsection
