<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create()
    {
        return view('pages.record-sale');
    }

    public function index()
    {
        $sales = Sale::all();
        return view('pages.view-sales', compact('sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'payment_type' => 'required|string',
            'sale_date' => 'required|date',
        ]);

        $sale = Sale::create([
            'vehicle_name' => $request->vehicle_name,
            'customer_name' => $request->customer_name,
            'amount_paid' => $request->amount_paid,
            'payment_type' => $request->payment_type,
            'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
            'sale_date' => $request->sale_date,
        ]);

        // Find the vehicle and update its data
        $vehicle = Vehicle::where('name', $request->vehicle_name)->first();
        if ($vehicle) {
            $vehicle->update([
                'customer_name' => $request->customer_name,
                'amount_paid' => $request->amount_paid,
                'payment_type' => $request->payment_type,
                'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
                'sale_date' => $request->sale_date,
            ]);
        }

        return redirect()->route('record-sale')->with('success', 'Sale recorded and vehicle data updated successfully.');
    }
}
