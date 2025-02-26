<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function user_assigned_roles()
    {
        return $this->hasMany(UserAssignedRole::class);
    }
}
