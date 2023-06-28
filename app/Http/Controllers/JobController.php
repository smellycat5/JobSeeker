<?php

namespace App\Http\Controllers;

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
        // return view('Job.jobIndex', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //    return view('Job.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobStoreRequest $request)
    {
        $data = $request->validated();
        $result = $this->job->create($data);
        return $this->success([$result], 'Job listing created successfully', Response::HTTP_OK);
        // return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $data = $this->job->find($job->id);
        return $this->success([$data], '', Response::HTTP_OK);
        // return view('Job.details', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('Job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobEditRequest $request, Job $job)
    {
        $validatedjob = $request->validated();
        $job->update($validatedjob);

        return redirect()->route('job.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('job.index')->with('deleted');
    }

    public function loginPage()
    {
        return view('Job.login');
    }
}
