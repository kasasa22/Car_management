<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'customer_name',
        'customer_contact',
        'amount_paid',
        'payment_type',
        'balance',
        'chassis_number',
        'sale_date',
        'total_amount',
        'period',
        'amount_credited',
        'monthly_deposit',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
