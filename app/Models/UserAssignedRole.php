<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAssignedRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_role_id',
        'job_listing_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job_listing()
    {
        return $this->belongsTo(JobListing::class);
    }

    public function user_role()
    {
        return $this->belongsTo(UserRole::class);
    }
}
