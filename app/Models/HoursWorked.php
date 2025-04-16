<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class HoursWorked extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_listing_id',
        'date',
        'hours'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job_listing()
    {
        return $this->belongsTo(JobListing::class);
    }

    public function rejections(): MorphMany
    {
        return $this->morphMany(Rejection::class, 'rejectable');
    }
}
