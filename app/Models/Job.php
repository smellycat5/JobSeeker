<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'salary',
        'location',
        'organization_id'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($job) {
            $job->expired_at = Carbon::parse($job->created_at)->addMonths(2);
            $job->save();
        });
    }
}
