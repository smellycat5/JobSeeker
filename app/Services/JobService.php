<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use App\Models\Job;

class JobService
{
    public function getJobs()
    {
        $data = Job::where('expired_at', '>=',Carbon::now())->get();
        return $data;
    }
}
