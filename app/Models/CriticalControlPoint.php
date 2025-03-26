<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticalControlPoint extends Model
{
    use HasFactory;

    protected $fillable = ['method_statement'];

    public function job_task()
    {
        return $this->hasOne(JobTask::class);
    }

    public function product_in_uses()
    {
        return $this->hasMany(ProductInUse::class);
    }
}
