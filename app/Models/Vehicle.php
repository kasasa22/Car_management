<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'color',
        'model',
        'amount_paid',
        'balance',
        'date_bought',
        'status',
        'period',
        'contact',
        'amount_credited',
        'monthly_deposit',
        'total_amount',
        'customer_name',
        'sale_date',
        'payment_type',
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function installmentPlans()
    {
        return $this->hasMany(InstallmentPlan::class);
    }

}
