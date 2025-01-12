<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;
    
    public function site()
    {
        return $this->hasOne(Site::class);
    }
    
    public function user_task()
    {
        return $this->hasMany(UserTask::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function job_phase()
    {
        return $this->hasMany(JobPhase::class);
    }

    public function hours_worked()
    {
        return $this->hasMany(HoursWorked::class);
    }

    public function audits()
    {
        return $this->hasMany(Audit::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
