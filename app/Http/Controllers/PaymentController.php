<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Vehicle;
use App\Models\Sale;

class PaymentController extends Controller
{
    public function create()
    {
        // Fetch vehicles with a balance greater than zero
        $vehicles = Vehicle::where('balance', '>', 0)->get();
        return view('pages.record-payment', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $vehicle = Vehicle::findOrFail($validated['vehicle_id']);
        $sale = Sale::where('vehicle_id', $validated['vehicle_id'])->firstOrFail();

        // Create the payment
        $payment = Payment::create([
            'vehicle_id' => $validated['vehicle_id'],
            'sale_id' => $sale->id,
            'amount' => $validated['amount'],
        ]);

        // Update the balances
        $vehicle->balance -= $validated['amount'];
        $sale->balance -= $validated['amount'];
        $vehicle->save();
        $sale->save();

        return redirect()->route('record-payment.create')->with('success', 'Payment made successfully.');
    }
}
