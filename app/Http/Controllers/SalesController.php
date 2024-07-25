<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function create()
    {
        $availableVehicles = Vehicle::where('status', 'Available')->get();
        return view('pages.record-sale', compact('availableVehicles'));
    }

    public function index()
    {
        $sales = Sale::all();
        return view('pages.view-sales', compact('sales'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $vehicle = Vehicle::find($request->vehicle_id);

            if (!$vehicle) {
                return response()->json(['success' => false, 'message' => 'Vehicle not found']);
            }

            $sale = Sale::create([
                'vehicle_id' => $vehicle->id,
                'customer_name' => $request->customer_name,
                'amount_paid' => $request->amount_paid,
                'payment_type' => $request->payment_type,
                'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
                'chassis_number' => $request->chassis_number,
                'sale_date' => $request->sale_date,
            ]);

            $vehicle->update([
                'status' => 'Sold',
                'customer_name' => $request->customer_name,
                'amount_paid' => $request->amount_paid,
                'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
                'sale_date' => $request->sale_date,
                'payment_type' => $request->payment_type,
                'total_amount' => $vehicle->total_amount,
            ]);
        });

        return redirect()->route('view-sales')->with('success', 'Sale created successfully');
    }

}
