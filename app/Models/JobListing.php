<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_number',
        'title',
        'description',
        'start_date',
        'end_date',
        'site_id'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];
    
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    
    public function user_tasks()
    {
        return $this->hasMany(UserTask::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function job_phases()
    {
        return $this->hasMany(JobPhase::class);
    }

    public function hours_workeds()
    {
        return $this->hasMany(HoursWorked::class);
    }

    public function user_assigned_roles()
    {
        return $this->hasMany(UserAssignedRole::class);
    }

    public function audits()
    {
        return $this->belongsToMany(Audit::class);
    }
}
