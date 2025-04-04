<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'employee_instructions'];

    public function job_listings()
    {
        return $this->hasMany(JobListing::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
