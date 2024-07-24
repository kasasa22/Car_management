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
        $vehicle = Vehicle::findOrFail($id);
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
            'balance' => 'required|numeric',
            'date_bought' => 'required|date',
            'status' => 'required|string|max:255',
            'amount_credited' => 'nullable|numeric',
            'monthly_deposit' => 'nullable|numeric',
        ]);

        Vehicle::create($validated);

        return redirect()->route('view-vehicles')->with('success', 'Vehicle added successfully!');
    }

}
