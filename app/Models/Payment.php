<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'sale_id', 'amount'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}

