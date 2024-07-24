<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use Illuminate\Http\Request;

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
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'customer_name' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'payment_type' => 'required|string',
            'balance' => 'nullable|numeric',
            'chassis_number' => 'required|string|max:255',
            'sale_date' => 'required|date',
        ]);

        $vehicle = Vehicle::find($request->vehicle_id);

        if ($vehicle) {
            // Create a new sale record
            $sale = Sale::create([
                'vehicle_id' => $request->vehicle_id,
                'customer_name' => $request->customer_name,
                'amount_paid' => $request->amount_paid,
                'payment_type' => $request->payment_type,
                'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
                'chassis_number' => $request->chassis_number,
                'sale_date' => $request->sale_date,
                'vehicle_name' => $vehicle->name,
            ]);

            // Update the vehicle details
            $vehicle->update([
                'status' => 'Sold',
                'customer_name' => $request->customer_name,
                'amount_paid' => $request->amount_paid,
                'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
                'sale_date' => $request->sale_date,
                'payment_type' => $request->payment_type,
                'total_amount' => $vehicle->total_amount, // Ensure this is updated if needed
            ]);

            return redirect()->route('sales.create')->with('success', 'Sale recorded and vehicle status updated successfully.');
        }

        return redirect()->route('sales.create')->with('error', 'Vehicle not found.');
    }
}
