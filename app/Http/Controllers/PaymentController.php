<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'sale_id' => 'required|exists:sales,id',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $vehicle = Vehicle::find($request->vehicle_id);
            $sale = Sale::find($request->sale_id);

            if (!$vehicle || !$sale) {
                return response()->json(['error' => 'Vehicle or Sale not found.'], 404);
            }

            $newBalance = $sale->balance - $request->payment_amount;
            $sale->update(['balance' => $newBalance]);
            $vehicle->update(['balance' => $newBalance]);

            // Log the payment
            DB::table('payments')->insert([
                'vehicle_id' => $request->vehicle_id,
                'sale_id' => $request->sale_id,
                'amount' => $request->payment_amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()->route('view-installments')->with('success', 'Payment made successfully!');
    }
}

