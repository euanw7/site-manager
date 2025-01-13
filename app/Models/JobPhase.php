<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPhase extends Model
{
    use HasFactory;

    public function job_listing()
    {
        return $this->hasOne(JobListing::class);
    }

    public function critical_control_point()
    {
        return $this->hasOne(CriticalControlPoint::class);
    }

    public function job_task()
    {
        return $this->hasMany(JobTask::class);
    }
}
