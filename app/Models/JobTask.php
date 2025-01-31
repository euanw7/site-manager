<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class JobTask extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'quality_critical',
        'job_phase_id'
    ];

    public function job_phase()
    {
        return $this->belongsTo(JobPhase::class);
    }

    public function critical_control_point()
    {
        return $this->belongsTo(CriticalControlPoint::class);
    }

    public function rejections(): MorphMany
    {
        return $this->morphMany(Rejection::class, 'rejectable');
    }
}
