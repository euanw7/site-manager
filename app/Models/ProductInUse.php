<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInUse extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'product_coverage', 
        'product_usage', 
        'product_tolerance', 
        'product_id', 
        'critical_control_point_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function critical_control_point()
    {
        return $this->belongsTo(CriticalControlPoint::class);
    }
}
