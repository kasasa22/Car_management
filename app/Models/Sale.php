<?php

// app/Models/Sale.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'customer_name',
        'amount_paid',
        'payment_type',
        'balance',
        'chassis_number',
        'sale_date',
        'vehicle_name',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
