<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSubmission extends Model
{
    public function job_task()
    {
        return $this->belongsTo(JobTask::class);
    }
}
