<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPhase extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function job_listing()
    {
        return $this->belongsTo(JobListing::class);
    }

    public function job_tasks()
    {
        return $this->hasMany(JobTask::class);
    }
}
