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

        $payment = Payment::create([
            'vehicle_id' => $validated['vehicle_id'],
            'sale_id' => $sale->id,
            'amount' => $validated['amount'],
        ]);

        $vehicle->balance -= $validated['amount'];
        $sale->balance -= $validated['amount'];
        $vehicle->save();
        $sale->save();

        return redirect()->route('record-payment.create')->with('success', 'Payment made successfully.');
    }

    public function getSaleDetails($vehicleId)
{
    $sale = Sale::where('vehicle_id', $vehicleId)->first();
    if ($sale) {
        return response()->json([
            'customer_name' => $sale->customer_name,
            'customer_contact' => $sale->customer_contact,
            'amount_paid' => $sale->amount_paid,
            'balance' => $sale->balance,
            'amount_credited' => $sale->amount_credited,
            'monthly_deposit' => $sale->monthly_deposit,
        ]);
    } else {
        return response()->json(['error' => 'Sale not found'], 404);
    }
}

}
