<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Http\Requests\OrganizationStoreRequest;
use App\Http\Requests\OrganizationEditRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Services\OrganizationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrganizationController extends Controller
{
    protected OrganizationService $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->organizationService->with('jobs')->get();
        return $this->success([$data], 'organizations retrieved successfully', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationStoreRequest $request)
    {
        $validated = $request->validated();
        $data = $this->organizationService->create($validated);
        return $this->success([$data], 'Organization successfully added', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        return $this->success([$organization], "", Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationEditRequest $request, Organization $organization)
    {
        $validated = $request->validated();
        $organization->update($validated);
        return $this->success([$organization], "Organization details udpated!", Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return $this->success([], "Organization deleted!", Response::HTTP_OK);
    }
}
