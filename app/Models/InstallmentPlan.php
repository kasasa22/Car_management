<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'customer_name',
        'total_amount',
        'monthly_deposit',
        'balance',
        'period',
        'amount_credited',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

