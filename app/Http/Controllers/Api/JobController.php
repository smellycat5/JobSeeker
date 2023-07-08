<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Organization;
use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobEditRequest;
use App\Services\JobService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $job, $jobService;

    public function __construct(Jobservice $jobService, Job $job)
    {
        $this->jobService = $jobService;
        $this->job = $job;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->jobService->getJobs();
        return $this->success([$data], 'Jobs retrieved successfully', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobStoreRequest $request)
    {
        $data = $request->validated();
        $result = $this->job->create($data);
        return $this->success([$result], 'Job listing created successfully', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return $this->success([$job], '', Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobEditRequest $request, Job $job)
    {
        $validated = $request->validated();
        $job->update($validated);
        return $this->success([$job], 'successfully updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return $this->success([], "Job listing removed!", Response::HTTP_OK);
    }

    public function loginPage()
    {
        return view('Job.login');
    }
}
