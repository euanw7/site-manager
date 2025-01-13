<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class HoursWorked extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function job_listing()
    {
        return $this->hasOne(JobListing::class);
    }

    public function rejections(): MorphMany
    {
        return $this->morphMany(Rejection::class, 'rejectable');
    }
}
