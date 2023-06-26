<?php

namespace App\Services;

use App\Models\Organization;

class OrganizationService
{
    public function viewOrganizations()
    {
        $organizations = Organization::with('job')->get();
        return $organizations;
    }
}
