<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id', 'installment_date', 'amount'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

