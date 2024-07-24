<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'amount', 'date', 'category', 'description', 'vehicle_name'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_name', 'name');
    }
}
