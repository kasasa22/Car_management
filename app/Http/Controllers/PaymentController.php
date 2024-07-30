<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Vehicle;
use App\Models\Sale;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $validated['user_id'] = Auth::id();

        $vehicle = Vehicle::findOrFail($validated['vehicle_id']);
        $sale = Sale::where('vehicle_id', $validated['vehicle_id'])->firstOrFail();

        // Create a new payment record
        Payment::create([
            'vehicle_id' => $validated['vehicle_id'],
            'sale_id' => $sale->id,
            'amount' => $validated['amount'],
            'user_id' => $validated['user_id'],
        ]);

        // Update the vehicle and sale balances
        $vehicle->balance -= $validated['amount'];
        $sale->balance -= $validated['amount'];
        $vehicle->save();
        $sale->save();

        // Create a notification for the payment
        Notification::create([
            'type' => 'payment_made',
            'message' => 'A payment of ' . number_format($validated['amount'], 2) . ' has been made for vehicle: ' . $vehicle->name.' (Plate: '.$vehicle->number.')',
            'user_id' => Auth::id(),
        ]);

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

    public function paymentsReport(Request $request)
    {
        // Retrieve the current month or the month specified in the request
        $month = $request->input('month', Carbon::now()->format('Y-m'));

        // Query payments for the specified month
        $payments = Payment::whereMonth('created_at', '=', Carbon::parse($month)->month)
                            ->whereYear('created_at', '=', Carbon::parse($month)->year)
                            ->with(['vehicle', 'user'])
                            ->get();

        return view('pages.payments-report', compact('payments', 'month'));
    }
}
