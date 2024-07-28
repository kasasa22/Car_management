<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        $vehicle = Vehicle::find($validated['vehicle_id']);
        $vehicle->balance -= $validated['payment_amount'];
        $vehicle->save();

        return response()->json([
            'success' => true,
            'balance' => $vehicle->balance,
        ]);
    }
}
