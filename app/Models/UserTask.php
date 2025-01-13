<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;

    public function user_assigned_to()
    {
        return $this->hasOne(User::class, 'user_assigned_to_id');
    }

    public function user_assigned_by()
    {
        return $this->hasOne(User::class, 'user_assigned_by_id');
    }

    public function job_listing()
    {
        return $this->hasOne(JobListing::class);
    }
}
