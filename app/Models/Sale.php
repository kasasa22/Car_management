<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_name', 'customer_name', 'amount_paid', 'payment_type', 'balance', 'sale_date'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_name', 'name');
    }
}
