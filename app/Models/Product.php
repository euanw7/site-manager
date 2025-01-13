<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function critical_control_points()
    {
        return $this->hasMany(CriticalControlPoint::class);
    }
}
