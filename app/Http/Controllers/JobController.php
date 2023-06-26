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
    Protected JobService $jobService;

    public function __construct(Jobservice $jobService)
    {
        $this->jobService =$jobService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = Job::with('organization')->get();
        return $this->success([$data], 'Projects retrieved successfully', Response::HTTP_OK);
        // return view('Job.jobIndex', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::with('job')->get();
        return view('Job.create',compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobStoreRequest $request)
    {
        $validated = $request->validated();
        Job::create($validated);
        return redirect()->route('job.index');
        // return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $job =Job::find($id);
        return view('Job.details', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('Job.edit',compact('job'));
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

    public function loginPage(){
        return view('Job.login');
    }
}
