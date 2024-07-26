<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pages.view-vehicles', compact('vehicles'));
    }

    public function show($id)
{
    $vehicle = Vehicle::with('expenses')->find($id);

    if (!$vehicle) {
        return response()->json(['error' => 'Vehicle not found.'], 404);
    }

    return response()->json($vehicle);
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'number' => 'required|string|max:255',
        'color' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'amount_paid' => 'required|numeric',
        'balance' => 'nullable|numeric',
        'date_bought' => 'required|date',
        'status' => 'required|string|max:255',
        'amount_credited' => 'nullable|numeric',
        'monthly_deposit' => 'nullable|numeric',
        'total_amount' => 'nullable|numeric',
        'customer_name' => 'nullable|string|max:255',
        'sale_date' => 'nullable|date',
        'payment_type' => 'nullable|string|max:255',
    ]);

    Vehicle::create($validated);

    return redirect()->route('view-vehicles')->with('success', 'Vehicle added successfully!');
}

public function viewInstallments()
{
    // Fetch vehicles with balance greater than zero
    $installmentPlans = Vehicle::where('balance', '>', 0)->get();

    return view('pages.view-installments', compact('installmentPlans'));
}


}
