<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function audits()
    {
        return $this->hasMany(Audit::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function rejections()
    {
        return $this->hasMany(Rejection::class);
    }

    public function hours_workeds()
    {
        return $this->hasMany(HoursWorked::class);
    }

    public function assigned_user_tasks()
    {
        return $this->hasMany(UserTask::class, 'user_assigned_to_id');
    }
    
    public function owned_user_tasks()
    {
        return $this->hasMany(UserTask::class, 'user_assigned_by_id');
    }
    
    public function user_assigned_roles()
    {
        return $this->hasMany(UserAssignedRole::class);
    }

    public function sites()
    {
        return $this->belongsToMany(Site::class);
    }

    public function is_admin()
    {
        return $this->is_admin;
    }
}
