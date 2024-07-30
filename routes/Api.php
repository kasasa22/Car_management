<?php
use Illuminate\Support\Facades\Route;
use App\Models\Vehicle;

Route::get('api/vehicle/{vehicle}/sales', function(Vehicle $vehicle) {
    return $vehicle->sales()->where('balance', '>', 0)->get(['id', 'balance']);
});
