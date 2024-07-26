<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'vehicle_id',
        'sales_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

