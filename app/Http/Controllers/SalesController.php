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
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'customer_name' => 'required|string|max:255',
            'customer_contact' => 'required|string|max:255',
            'amount_paid' => 'required|integer',
            'payment_type' => 'required|string|in:full,installment',
            'chassis_number' => 'required|string|max:255',
            'sale_date' => 'required|date',
            'balance' => 'nullable|integer',
            'total_amount' => 'nullable|integer',
            'period' => 'nullable|string|max:255',
            'amount_credited' => 'nullable|integer',
            'monthly_deposit' => 'nullable|integer',
        ]);


        $response = DB::transaction(function () use ($request) {
            $vehicle = Vehicle::find($request->vehicle_id);

            if (!$vehicle) {
                throw new \Exception('Vehicle not found');
            }

            $sale = Sale::create([
                'vehicle_id' => $vehicle->id,
                'customer_name' => $request->customer_name,
                'customer_contact' => $request->customer_contact,
                'amount_paid' => $request->amount_paid,
                'payment_type' => $request->payment_type,
                'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
                'chassis_number' => $request->chassis_number,
                'sale_date' => $request->sale_date,
                'total_amount' => $request->total_amount,
                'period' => $request->period,
                'amount_credited' => $request->amount_credited,
                'monthly_deposit' => $request->monthly_deposit,
            ]);

            $vehicle->update([
                'status' => 'Sold',
                'customer_name' => $request->customer_name,
                'contact' => $request->contact,
                'amount_paid' => $request->amount_paid,
                'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
                'sale_date' => $request->sale_date,
                'payment_type' => $request->payment_type,
                'total_amount' => $request->total_amount,
                'period' => $request->period,
                'amount_credited' => $request->amount_credited,
                'monthly_deposit' => $request->monthly_deposit,
            ]);

            return redirect()->route('view-sales')->with('success', 'Sale created successfully');
        });

        return $response;
    }

    public function show($id)
    {
        $sale = Sale::with('vehicle')->find($id);
        if ($sale) {
            return response()->json($sale);
        } else {
            return response()->json(['error' => 'Sale not found'], 404);
        }
    }
}
