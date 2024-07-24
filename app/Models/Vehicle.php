<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'number', 'color', 'model', 'status', 'customer_name', 'customer_contact',
        'amount_sold', 'amount_paid', 'total_amount', 'balance', 'date_bought', 'period',
        'amount_credited', 'monthly_deposit'
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'vehicle_name', 'name');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'vehicle_name', 'name');
    }

    public function installmentPlans()
    {
        return $this->hasMany(InstallmentPlan::class);
    }
    
}
