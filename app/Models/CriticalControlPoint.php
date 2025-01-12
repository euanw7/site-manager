<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticalControlPoint extends Model
{
    use HasFactory;

    public function job_phase()
    {
        return $this->hasOne(JobPhase::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
