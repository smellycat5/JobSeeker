<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'location',
        'email',
        'user_id'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
