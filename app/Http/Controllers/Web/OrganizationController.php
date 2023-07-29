<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Http\Requests\OrganizationStoreRequest;
use App\Http\Requests\OrganizationEditRequest;
use Illuminate\Http\Response;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Services\OrganizationService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrganizationController extends Controller
{
    protected Organization $organization;
    protected OrganizationService $organizationService;

    public function __construct(OrganizationService $organizationService, Organization $organization)
    {
        $this->organizationService = $organizationService;
        $this->organization = $organization;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = $this->organization->with('jobs')->latest()->get();
        return view('components.organization.index', compact('organizations'));
    }

    /**
     * Display a listing of the user owned resource.
     */
    public function userIndex()
    {
        $user = auth()->id();
        $organizations= $this->organization->with('jobs')->where('user_id', "$user")->latest()->get();
        return view('components.organization.index', compact('organizations'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $this->organization->create($validated);
        return redirect()->route( 'organization.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        return view('components.details', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('Organization.edit',compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationEditRequest $request, Organization $organization)
    {
        $validated = $request->validated();
        $organization->update($validated);
        return redirect()->route( 'organization.index');

        // return redirect()->route('organization.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route( 'organization.index');
    }
}
