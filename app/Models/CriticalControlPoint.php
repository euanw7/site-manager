<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticalControlPoint extends Model
{
    use HasFactory;

    public function job_tasks()
    {
        return $this->hasOne(JobTask::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
